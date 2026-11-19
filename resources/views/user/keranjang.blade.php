
@extends('layouts.customer')

@section('content')

<div class="booking-modal" style="box-sizing:border-box; background:#fff; border-radius:12px; box-shadow:0 10px 30px rgba(40,30,20,.08); width:calc(100% - 40px); max-width:520px; padding:24px; margin:45px auto;">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; border-bottom:1px solid #e9e4dc; padding-bottom:15px;">

        <h2 style="font:600 20px 'Playfair Display',serif; margin:0;">
            Keranjang Booking
        </h2>

        <a href="{{ route('user.index') }}"
            aria-label="Keluar"
            style="background:none; border:none; font-size:22px; text-decoration:none; color:#77736d; cursor:pointer;">
            &times;
        </a>

    </div>


    <!-- JUMLAH LAYANAN -->
    <div style="font-size:9px; color:#77736d; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px; display:flex; justify-content:space-between; align-items:center;">

        <span>
            PERAWATAN DIPILIH ({{ count($cart) }} LAYANAN)
        </span>

        <a href="{{ route('user.layananUser') }}"
            style="color:#b99a68; text-decoration:none; font-weight:600;">
            + Tambah Perawatan Lain
        </a>

    </div>


    <!-- DAFTAR KERANJANG -->
    <div id="cartItems">

        @forelse ($cart as $item)

            <div class="item-card"
                data-price="{{ $item['harga'] }}"
                data-qty="{{ $item['qty'] }}"
                style="border:1px solid #e9e4dc; border-radius:8px; padding:12px; display:flex; gap:12px; align-items:center; margin-bottom:10px; background:#faf8f5;">

                @if (!empty($item['gambar']))

                    <img src="{{ asset('storage/' . $item['gambar']) }}"
                        alt="{{ $item['nama_layanan'] }}"
                        style="width:55px; height:55px; border-radius:6px; object-fit:cover;">

                @else

                    <div style="width:55px; height:55px; border-radius:6px; background:#eee7dc; display:flex; align-items:center; justify-content:center; font-size:9px; color:#77736d; text-align:center;">
                        Tidak ada foto
                    </div>

                @endif


                <div style="flex:1; min-width:0;">

                    <div style="font:600 13px 'Playfair Display',serif; margin-bottom:4px;">
                        {{ $item['nama_layanan'] }}
                    </div>

                    <div style="font-size:11px; font-weight:700; color:#25231f;">
                        Rp {{ number_format($item['harga'], 0, ',', '.') }}
                    </div>

                
                    <div style="font-size:10px; color:#b99a68; margin-top:3px;">
                        Total: Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}
                    </div>

                </div>


                <!-- HAPUS LAYANAN -->
                <form action="{{ route('user.keranjang.hapus', $item['id']) }}"
                    method="POST"
                    onsubmit="return confirm('Hapus layanan ini dari keranjang?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        aria-label="Hapus layanan"
                        style="background:none; border:none; color:#77736d; cursor:pointer; font-size:17px;">
                        🗑
                    </button>

                </form>

            </div>

        @empty

            <div style="text-align:center; padding:30px 15px; background:#faf8f5; border:1px dashed #e9e4dc; border-radius:8px;">

                <div style="font-size:30px; margin-bottom:10px;">
                    🛒
                </div>

                <h3 style="font:600 16px 'Playfair Display',serif; margin:0 0 8px;">
                    Keranjang masih kosong
                </h3>

                <p style="font-size:11px; color:#77736d; margin-bottom:15px;">
                    Silakan pilih layanan yang ingin kamu booking.
                </p>

                <a href="{{ route('user.layananUser') }}"
                    style="display:inline-block; background:#b99a68; color:#fff; padding:10px 18px; border-radius:5px; text-decoration:none; font-size:11px; font-weight:700;">
                    Lihat Layanan
                </a>

            </div>

        @endforelse

    </div>


    @if (count($cart) > 0)

        <!-- TANGGAL KUNJUNGAN -->
        <div style="margin:20px 0;">

            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px; gap:8px;">

                <span style="font-size:9px; color:#77736d; text-transform:uppercase; letter-spacing:1px;">
                    TANGGAL KUNJUNGAN
                </span>

                <div id="monthYearLabel" style="font-size:12px; font-weight:600; color:#25231f;"></div>

                <div style="display:flex; gap:5px;">

                    <button id="prevDatesBtn" type="button"
                        style="background:#fff; border:1px solid #e9e4dc; border-radius:4px; width:24px; height:24px; cursor:pointer; font-size:11px;">
                        &#10094;
                    </button>

                    <button id="nextDatesBtn" type="button"
                        style="background:#fff; border:1px solid #e9e4dc; border-radius:4px; width:24px; height:24px; cursor:pointer; font-size:11px;">
                        &#10095;
                    </button>

                </div>

            </div>

            <div id="datesGrid"
                style="display:grid; grid-template-columns:repeat(5,1fr); gap:8px; overflow-x:auto; padding-bottom:4px;">
            </div>

            <input type="hidden" id="selectedDate">

        </div>


        <!-- JAM KUNJUNGAN -->
        <div style="margin-bottom:20px;">

            <div style="font-size:9px; color:#77736d; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">
                JAM KUNJUNGAN
            </div>

            <div style="display:flex; gap:8px; flex-wrap:wrap;">

                <button class="time-btn" type="button">10.00 WIB</button>
                <button class="time-btn" type="button">13.00 WIB</button>
                <button class="time-btn active" type="button">16.00 WIB</button>
                <button class="time-btn" type="button">17.00 WIB</button>
                <button class="time-btn" type="button">19.00 WIB</button>

            </div>

            <input type="hidden" id="selectedTime" value="16.00 WIB">

        </div>


        <!-- METODE PEMBAYARAN -->
        <div style="margin-bottom:20px;">

            <div style="font-size:9px; color:#77736d; text-transform:uppercase; letter-spacing:1px; margin-bottom:8px;">
                METODE PEMBAYARAN
            </div>

            <label id="optQris" class="payment-option selected">

                <input type="radio" name="paymentMethod" value="qris" checked style="margin-top:2px; accent-color:#b99a68;">

                <div style="flex:1;">

                    <div style="font-size:12px; font-weight:700; margin-bottom:2px;">
                        QRIS / E-Wallet
                    </div>

                    <div style="font-size:10px; color:#77736d;">
                        Gopay, ShopeePay, DANA, OVO
                    </div>

                </div>

            </label>


            <label id="optBank" class="payment-option">

                <input type="radio" name="paymentMethod" value="bank" style="margin-top:2px; accent-color:#b99a68;">

                <div style="flex:1;">

                    <div style="font-size:12px; font-weight:700; margin-bottom:2px;">
                        Transfer Bank
                    </div>

                    <div style="font-size:10px; color:#77736d;">
                        BCA, Mandiri, BRI, BNI
                    </div>

                </div>

            </label>

        </div>


        <!-- RINGKASAN PEMBAYARAN -->
        <div style="border-top:1px dashed #e9e4dc; padding-top:15px; margin-bottom:20px;">

            <div style="display:flex; justify-content:space-between; font-size:11px; color:#77736d; margin-bottom:6px;">

                <span id="subtotalLabel">
                    Subtotal Layanan
                </span>

                <span id="subtotalValue">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </span>

            </div>

            <div style="display:flex; justify-content:space-between; font-size:11px; color:#77736d; margin-bottom:6px;">

                <span>Biaya Penanganan / Admin</span>

                <span>Rp 0</span>

            </div>

            <div style="display:flex; justify-content:space-between; font-size:14px; font-weight:700; color:#25231f; margin-top:8px; border-top:1px solid #e9e4dc; padding-top:8px;">

                <span>Total Pembayaran</span>

                <span id="totalValue">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </span>

            </div>

        </div>


        <!-- CHECKOUT -->
        <button id="checkoutBtn" type="button"
            style="width:100%; background:#b99a68; color:#fff; border:none; border-radius:6px; padding:14px; font:700 12px 'DM Sans',sans-serif; cursor:pointer; text-align:center; letter-spacing:.5px;">
            Konfirmasi &amp; Bayar Sekarang
        </button>

    @endif

</div>


<style>
.time-btn {
    background:#fff;
    border:1px solid #e9e4dc;
    border-radius:6px;
    padding:8px 12px;
    font-size:11px;
    font-weight:500;
    cursor:pointer;
}

.time-btn.active {
    background:#25231f;
    color:#fff;
    border-color:#25231f;
}

.payment-option {
    border:1px solid #e9e4dc;
    border-radius:8px;
    padding:12px;
    display:flex;
    align-items:flex-start;
    gap:10px;
    margin-bottom:8px;
    cursor:pointer;
    background:#fff;
}

.payment-option.selected {
    border-color:#b99a68;
    background:#fdfbf7;
}
</style>


<script>

// FORMAT RUPIAH
function formatRupiah(number) {
    return 'Rp ' + Number(number).toLocaleString('id-ID');
}


// TANGGAL KUNJUNGAN
const datesGrid = document.getElementById('datesGrid');
const monthYearLabel = document.getElementById('monthYearLabel');
const selectedDateInput = document.getElementById('selectedDate');

const monthsNames = [
    'Januari', 'Februari', 'Maret', 'April',
    'Mei', 'Juni', 'Juli', 'Agustus',
    'September', 'Oktober', 'November', 'Desember'
];

const daysNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

let currentOffset = 0;
let selectedDateStr = '';

function renderDates() {

    datesGrid.innerHTML = '';

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const baseDate = new Date(today);
    baseDate.setDate(today.getDate() + currentOffset);

    for (let i = 0; i < 5; i++) {

        const d = new Date(baseDate);
        d.setDate(baseDate.getDate() + i);

        const dayName = daysNames[d.getDay()];
        const dayNum = d.getDate();

        const monthShort = d.toLocaleString('id-ID', {
            month: 'short'
        });

        const fullStr = [
            d.getFullYear(),
            String(d.getMonth() + 1).padStart(2, '0'),
            String(d.getDate()).padStart(2, '0')
        ].join('-');

        const active = fullStr === selectedDateStr;

        const card = document.createElement('div');

        card.style.cssText = `
            background:${active ? '#b99a68' : '#fff'};
            color:${active ? '#fff' : '#25231f'};
            border:1px solid ${active ? '#b99a68' : '#e9e4dc'};
            border-radius:8px;
            padding:10px 4px;
            text-align:center;
            cursor:pointer;
            transition:all .2s;
        `;

        card.innerHTML = `
            <div style="font-size:9px;text-transform:uppercase;margin-bottom:4px;opacity:.8;">
                ${dayName}
            </div>
            <div style="font-size:14px;font-weight:700;">
                ${dayNum}
            </div>
            <div style="font-size:8px;margin-top:2px;opacity:.8;">
                ${monthShort}
            </div>
        `;

        card.addEventListener('click', () => {

            selectedDateStr = fullStr;
            selectedDateInput.value = fullStr;

            renderDates();

        });

        datesGrid.appendChild(card);

    }

    monthYearLabel.textContent =
        `${monthsNames[baseDate.getMonth()]} ${baseDate.getFullYear()}`;

}


// PILIH TANGGAL
document.getElementById('nextDatesBtn').addEventListener('click', () => {

    currentOffset += 5;
    renderDates();

});

document.getElementById('prevDatesBtn').addEventListener('click', () => {

    currentOffset = Math.max(0, currentOffset - 5);
    renderDates();

});


// TANGGAL DEFAULT HARI INI
const today = new Date();

selectedDateStr = [
    today.getFullYear(),
    String(today.getMonth() + 1).padStart(2, '0'),
    String(today.getDate()).padStart(2, '0')
].join('-');

selectedDateInput.value = selectedDateStr;

renderDates();


// PILIH JAM
document.querySelectorAll('.time-btn').forEach(btn => {

    btn.addEventListener('click', () => {

        document.querySelectorAll('.time-btn').forEach(b => {
            b.classList.remove('active');
        });

        btn.classList.add('active');

        document.getElementById('selectedTime').value = btn.textContent.trim();

    });

});


// PILIH PEMBAYARAN
const optQris = document.getElementById('optQris');
const optBank = document.getElementById('optBank');

const radioQris = optQris.querySelector('input');
const radioBank = optBank.querySelector('input');

function selectPayment(selected, other, radio) {

    radio.checked = true;

    selected.classList.add('selected');
    other.classList.remove('selected');

}

optQris.addEventListener('click', () => {
    selectPayment(optQris, optBank, radioQris);
});

optBank.addEventListener('click', () => {
    selectPayment(optBank, optQris, radioBank);
});


// CHECKOUT
document.getElementById('checkoutBtn')?.addEventListener('click', () => {

    if (!selectedDateInput.value) {
        alert('Silakan pilih tanggal kunjungan.');
        return;
    }

    const selectedTime = document.getElementById('selectedTime').value;

    if (!selectedTime) {
        alert('Silakan pilih jam kunjungan.');
        return;
    }

    const selectedPayment = document.querySelector(
        'input[name="paymentMethod"]:checked'
    ).value;

    if (selectedPayment === 'qris') {
        window.location.href = '{{ route("user.qris") }}';
    } else if (selectedPayment === 'bank') {
        window.location.href = '{{ route("user.bank") }}';
    }

});


// HOVER TOMBOL CHECKOUT
const checkoutBtn = document.getElementById('checkoutBtn');

if (checkoutBtn) {

    checkoutBtn.addEventListener('mouseenter', () => {
        checkoutBtn.style.background = '#a98855';
    });

    checkoutBtn.addEventListener('mouseleave', () => {
        checkoutBtn.style.background = '#b99a68';
    });

}

</script>

@endsection
