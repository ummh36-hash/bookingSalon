@extends('layouts.customer')

@section('content')

    <!-- DAFTAR LAYANAN -->

    <main id="home" style="width:86%; max-width:1120px; margin:0 auto; padding:55px 0 70px;">

        <!-- STATUS SALON -->

        <div id="storeStatus" style="display:inline-flex; align-items:center; gap:8px; background:#fff; border:1px solid #e9e4dc; padding:7px 14px; border-radius:20px; font-size:11px; font-weight:600; margin-bottom:12px;">

            <span id="statusIndicator" style="width:8px; height:8px; border-radius:50%; display:inline-block; background:#999;"></span>

            <span id="statusText">Memeriksa status...</span>

        </div>

        <h1 style="font:600 27px 'Playfair Display',serif; margin:0 0 35px;">Layanan &amp; Harga</h1>

        <section id="layanan">

            <!-- FILTER KATEGORI -->

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

            <!-- DAFTAR LAYANAN DARI DATABASE -->

            <div id="serviceGrid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(230px,1fr)); gap:22px;">

                @forelse ($layanans as $layanan)

                    <article class="service-card"

                        data-category="{{ strtolower($layanan->kategori) }}"

                        style="background:#fff; border-radius:8px; overflow:hidden; box-shadow:0 5px 18px rgba(40,30,20,.06); display:flex; flex-direction:column;">

                        <!-- FOTO LAYANAN -->

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

                            <!-- KATEGORI -->

                            <span style="font-size:9px; color:#b99a68; text-transform:uppercase; letter-spacing:1.2px; font-weight:700;">

                                {{ $layanan->kategori }}

                            </span>

                            <!-- NAMA LAYANAN -->

                            <h3 style="font:600 17px 'Playfair Display',serif; margin:7px 0;">

                                {{ $layanan->nama_layanan }}

                            </h3>

                            <!-- HARGA -->

                            <div style="font-size:12px; font-weight:700; margin-bottom:7px;">

                                Rp {{ number_format($layanan->harga, 0, ',', '.') }}

                            </div>

                            <!-- DESKRIPSI -->

                            <p style="color:#77736d; font-size:10px; line-height:1.7; min-height:51px; margin:0 0 14px;">

                                {{ $layanan->deskripsi }}

                            </p>

                            <!-- TOMBOL -->

                            <a href="{{ route('user.layananUser') }}"

                                style="margin-top:auto; text-align:center; text-decoration:none; border:0; background:#b99a68; color:#fff; border-radius:4px; padding:11px 12px; font:700 10px 'DM Sans',sans-serif;">

                                Lihat Layanan

                            </a>

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

    <!-- FORM KIRIM PESAN -->

    <section id="keranjang" style="width:min(900px,86%); margin:5px auto 70px; background:linear-gradient(135deg,#c5a77e 0%,#a98960 100%); border:1px solid rgba(255,255,255,.45); border-radius:18px; padding:40px 7%; box-sizing:border-box; box-shadow:0 16px 38px rgba(75,55,32,.13);">

        <h2 id="kontak" style="position:relative; text-align:center; color:#fff; font:700 29px 'Playfair Display',serif; letter-spacing:.3px; margin:0 0 28px;">

            Kotak Kirim Pesan

        </h2>

        <form action="{{ route('user.pesan.store') }}" method="POST"
            style="position:relative; max-width:620px; margin:0 auto; display:grid; gap:16px;">

            @csrf

            <input type="text" name="nama" placeholder="Nama" aria-label="Nama" required
                value="{{ old('nama', auth()->user()->name) }}"
                style="width:100%; box-sizing:border-box; border:1px solid rgba(255,255,255,.55); border-radius:9px; background:rgba(255,255,255,.92); color:#38332c; padding:15px 17px; font:500 13px 'DM Sans',sans-serif; outline:none;">

            <select name="kategori" aria-label="Kategori" required
                style="width:100%; box-sizing:border-box; border:1px solid rgba(255,255,255,.55); border-radius:9px; background:rgba(255,255,255,.92); color:#81796e; padding:15px 17px; font:500 13px 'DM Sans',sans-serif; outline:none; cursor:pointer;">

                <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>Kategori</option>
                <option value="Facial Basic" {{ old('kategori') == 'Facial Basic' ? 'selected' : '' }}>Facial Basic</option>
                <option value="Facial Acne" {{ old('kategori') == 'Facial Acne' ? 'selected' : '' }}>Facial Acne</option>
                <option value="Hair Spa" {{ old('kategori') == 'Hair Spa' ? 'selected' : '' }}>Hair Spa</option>
                <option value="Manicure" {{ old('kategori') == 'Manicure' ? 'selected' : '' }}>Manicure</option>
                <option value="Body Massage" {{ old('kategori') == 'Body Massage' ? 'selected' : '' }}>Body Massage</option>
                <option value="Makeup Natural" {{ old('kategori') == 'Makeup Natural' ? 'selected' : '' }}>Makeup Natural</option>

            </select>

            <textarea name="deskripsi" placeholder="Deskripsi" aria-label="Deskripsi" required
                style="width:100%; box-sizing:border-box; min-height:115px; resize:vertical; line-height:1.6; border:1px solid rgba(255,255,255,.55); border-radius:9px; background:rgba(255,255,255,.92); color:#38332c; padding:15px 17px; font:500 13px 'DM Sans',sans-serif; outline:none;">{{ old('deskripsi') }}</textarea>

            @if (session('success'))
                <div style="background:#edf7ed; color:#2e7d32; padding:12px 15px; border-radius:8px; font-size:12px;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="background:#fff0f0; color:#b3261e; padding:12px 15px; border-radius:8px; font-size:12px;">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <button type="submit"
                style="justify-self:end; min-width:125px; border:1px solid #fff; border-radius:8px; background:#29251f; color:#fff; padding:12px 27px; font:700 11px 'DM Sans',sans-serif; letter-spacing:.5px; text-transform:uppercase; cursor:pointer;">
                Kirim
            </button>

        </form>

    </section>

    <!-- JAVASCRIPT -->

    <script>

        // STATUS BUKA / TUTUP SALON

        function updateStoreStatus() {

            const now = new Date();

            const day = now.getDay();

            const hour = now.getHours();

            const statusText = document.getElementById("statusText");

            const statusIndicator = document.getElementById("statusIndicator");

            const isOpenDay = day >= 1 && day <= 6;

            const isOpenHour = hour >= 9 && hour < 20;

            if (isOpenDay && isOpenHour) {

                statusText.textContent = "Buka Sekarang (09.00 - 20.00 WIB)";

                statusIndicator.style.background = "#2e7d32";

            } else {

                statusText.textContent = "Tutup Sekarang (Buka Senin-Sabtu 09.00 - 20.00 WIB)";

                statusIndicator.style.background = "#d32f2f";

            }

        }

        updateStoreStatus();

        setInterval(updateStoreStatus, 60000);

        // FILTER LAYANAN

        const filterButtons = document.querySelectorAll(".filter");

        const serviceCards = document.querySelectorAll(".service-card");

        filterButtons.forEach(button => {

            button.addEventListener("click", () => {

                // Mengubah tampilan tombol aktif

                filterButtons.forEach(item => {

                    item.style.background = "#fff";

                    item.style.color = "#615c55";

                    item.style.borderColor = "#e0dbd2";

                });

                button.style.background = "#25231f";

                button.style.color = "#fff";

                button.style.borderColor = "#25231f";

                const selected = button.dataset.filter;

                // Menampilkan layanan sesuai kategori

                serviceCards.forEach(card => {

                    const category = card.dataset.category;

                    card.style.display =

                        selected === "all" || category === selected

                            ? "flex"

                            : "none";

                });

            });

        });

        </script>

@endsection
