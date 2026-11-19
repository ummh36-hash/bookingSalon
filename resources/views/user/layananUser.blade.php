
@extends('layouts.customer')

@section('content')

<main id="home" style="width:86%; max-width:1120px; margin:0 auto; padding:55px 0 70px;">

    {{-- Status toko --}}
    <div id="storeStatus" style="display:inline-flex; align-items:center; gap:8px; background:#fff; border:1px solid #e9e4dc; padding:7px 14px; border-radius:20px; font-size:11px; font-weight:600; margin-bottom:12px;">
        <span id="statusIndicator" style="width:8px; height:8px; border-radius:50%; display:inline-block; background:#999;"></span>
        <span id="statusText">Memeriksa status...</span>
    </div>

    <h1 style="font:600 27px 'Playfair Display',serif; margin:0 0 35px;">
        Layanan &amp; Harga
    </h1>

    <section id="layanan">

        {{-- Filter kategori --}}
        <div style="display:flex; flex-wrap:wrap; gap:9px; margin-bottom:25px;">

            <button class="filter active" data-filter="all"
                style="border:1px solid #25231f; background:#25231f; color:#fff; padding:8px 16px; border-radius:20px; font:600 10px 'DM Sans',sans-serif; cursor:pointer;">
                SEMUA
            </button>

            <button class="filter" data-filter="wajah"
                style="border:1px solid #e0dbd2; background:#fff; color:#615c55; padding:8px 16px; border-radius:20px; font:600 10px 'DM Sans',sans-serif; cursor:pointer;">
                WAJAH
            </button>

            <button class="filter" data-filter="tubuh"
                style="border:1px solid #e0dbd2; background:#fff; color:#615c55; padding:8px 16px; border-radius:20px; font:600 10px 'DM Sans',sans-serif; cursor:pointer;">
                TUBUH &amp; SPA
            </button>

            <button class="filter" data-filter="kuku"
                style="border:1px solid #e0dbd2; background:#fff; color:#615c55; padding:8px 16px; border-radius:20px; font:600 10px 'DM Sans',sans-serif; cursor:pointer;">
                KUKU &amp; MAKEUP
            </button>

        </div>

        {{-- Daftar layanan --}}
        <div id="serviceGrid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(230px,1fr)); gap:22px;">

            @forelse ($layanans as $layanan)

                <article class="service-card"
                    data-category="{{ strtolower($layanan->kategori) }}"
                    style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 5px 18px rgba(40,30,20,.06); display:flex; flex-direction:column;">

                    @if ($layanan->gambar)

                        <img src="{{ asset('storage/' . $layanan->gambar) }}"
                            alt="{{ $layanan->nama_layanan }}"
                            style="width:100%; height:165px; object-fit:cover; display:block;">

                    @else

                        <div style="height:165px; display:grid; place-items:center; background:#faf6f0; color:#77736d;">
                            Tidak ada foto
                        </div>

                    @endif

                    <div style="padding:15px; display:flex; flex-direction:column; flex:1;">

                        <span style="font-size:9px; color:#b99a68; text-transform:uppercase; letter-spacing:1.2px; font-weight:700;">
                            {{ $layanan->kategori }}
                        </span>

                        <h3 style="font:600 17px 'Playfair Display',serif; margin:7px 0;">
                            {{ $layanan->nama_layanan }}
                        </h3>

                        <div style="font-size:12px; font-weight:700; margin-bottom:7px;">
                            Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                        </div>

                        <p style="color:#77736d; font-size:10px; line-height:1.7; min-height:51px; margin:0 0 14px;">
                            {{ $layanan->deskripsi }}
                        </p>

                        {{-- Tombol tambah ke keranjang --}}
                        <form action="{{ route('user.keranjang.tambah') }}"
                            method="POST"
                            style="margin-top:auto;">

                            @csrf

                            <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">

                            <button type="submit"
                                style="width:100%; border:0; background:#b99a68; color:#fff; border-radius:4px; padding:11px 12px; font:700 10px 'DM Sans',sans-serif; cursor:pointer;">
                                + Tambah ke Keranjang
                            </button>

                        </form>

                    </div>
                </article>

            @empty

                <p style="color:#77736d;">
                    Belum ada layanan yang tersedia.
                </p>

            @endforelse

        </div>

    </section>

</main>

<script>

// Memeriksa status toko
const statusIndicator = document.getElementById("statusIndicator");
const statusText = document.getElementById("statusText");

function checkStoreStatus() {

    const isOpen = true;

    if (isOpen) {
        statusIndicator.style.background = "#4caf50";
        statusText.textContent = "Toko Buka";
    } else {
        statusIndicator.style.background = "#f44336";
        statusText.textContent = "Toko Tutup";
    }

}

checkStoreStatus();


// Filter kategori
document.querySelectorAll(".filter").forEach(button => {

    button.addEventListener("click", () => {

        document.querySelectorAll(".filter").forEach(item => {
            item.style.background = "#fff";
            item.style.color = "#615c55";
            item.style.borderColor = "#e0dbd2";
        });

        button.style.background = "#25231f";
        button.style.color = "#fff";
        button.style.borderColor = "#25231f";

        const filter = button.dataset.filter;

        document.querySelectorAll(".service-card").forEach(card => {

            card.style.display =
                filter === "all" || card.dataset.category === filter
                ? "flex"
                : "none";

        });

    });

});

</script>

@endsection
