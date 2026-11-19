
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Flawless | Beauty & Spa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #f5f2ec;
            --white: #fff;
            --ink: #242321;
            --muted: #77736d;
            --gold: #b99a68;
            --rose: #a96f6b;
            --line: #e9e4dc;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--cream);
            color: var(--ink);
            font-family: "DM Sans", sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1120px, 86%);
            margin: auto;
        }

        header {
            height: 76px;
            background: rgba(255,255,255,.96);
            display: flex;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 20;
            border-bottom: 1px solid rgba(0,0,0,.035);
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            white-space: nowrap;
        }

        .brand-mark {
            width: 39px;
            height: 39px;
            border: 1px solid #d8cbb7;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: var(--gold);
            font-family: "Playfair Display", serif;
            font-size: 20px;
        }

        .brand-name {
            font: 600 20px "Playfair Display", serif;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 27px;
            font-size: 12px;
            color: #55514b;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 30px;
            padding: 12px 21px;
            font-size: 11px;
            font-weight: 700;
            transition: .2s ease;
            cursor: pointer;
            border: 1px solid var(--ink);
        }

        .btn-dark {
            background: var(--ink);
            color: white;
        }

        .btn-light {
            background: white;
            color: var(--ink);
            border-color: #d9d3ca;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .hero {
            min-height: 435px;
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            align-items: center;
            gap: 50px;
            padding: 70px 0 82px;
        }

        .hero h1 {
            font: 700 clamp(35px, 4.5vw, 56px)/1.12 "Playfair Display", serif;
            margin-bottom: 19px;
        }

        .hero h1 span {
            color: var(--rose);
            display: block;
        }

        .hero p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.9;
            max-width: 490px;
            margin-bottom: 24px;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-image {
            height: 265px;
            overflow: hidden;
            border-radius: 4px;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        section {
            padding: 35px 0 65px;
        }

        .section-title {
            font: 600 29px "Playfair Display", serif;
            margin-bottom: 20px;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-bottom: 25px;
        }

        .filter {
            border: 1px solid #e0dbd2;
            background: #fff;
            color: #615c55;
            padding: 8px 16px;
            border-radius: 20px;
            font: 600 10px "DM Sans", sans-serif;
            cursor: pointer;
        }

        .filter.active,
        .filter:hover {
            background: var(--ink);
            color: white;
            border-color: var(--ink);
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .service-card {
            background: white;
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(40,30,20,.035);
            display: flex;
            flex-direction: column;
        }

        .service-card img {
            display: block;
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .no-image {
            width: 100%;
            height: 180px;
            display: grid;
            place-items: center;
            background: #faf6f0;
            color: var(--muted);
            font-size: 12px;
        }

        .service-info {
            padding: 17px 17px 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .service-category {
            font-size: 9px;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 1.3px;
            font-weight: 700;
        }

        .service-info h3 {
            font: 600 18px "Playfair Display", serif;
            margin: 7px 0 8px;
        }

        .price {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .service-info p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.75;
            min-height: 58px;
        }

        .service-info .detail {
            display: inline-block;
            align-self: flex-start;
            margin-top: auto;
            padding-top: 12px;
            font-size: 10px;
            font-weight: 700;
            border-bottom: 1px solid var(--gold);
            padding-bottom: 3px;
        }

        .reviews {
            padding-top: 55px;
        }

        .review-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .review-card {
            background: white;
            padding: 23px;
            border-radius: 8px;
        }

        .stars {
            color: var(--gold);
            letter-spacing: 3px;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .review-card p {
            color: #625e58;
            font-size: 11px;
            line-height: 1.8;
            margin-bottom: 16px;
        }

        .review-card strong {
            font-size: 11px;
        }

        .location {
            padding: 50px 0 90px;
        }

        .location-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            align-items: center;
        }

        .map-placeholder {
            min-height: 260px;
            border-radius: 8px;
            overflow: hidden;
            background: #e8e8e2;
        }

        .map-placeholder iframe {
            width: 100%;
            height: 260px;
            border: 0;
            display: block;
        }

        .eyebrow {
            color: var(--gold);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.7px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .location h2 {
            font: 600 27px "Playfair Display", serif;
            margin-bottom: 17px;
        }

        .location-list {
            list-style: none;
            margin: 0 0 20px;
        }

        .location-list li {
            display: flex;
            gap: 12px;
            margin: 13px 0;
            color: #625e58;
            font-size: 11px;
            line-height: 1.7;
        }

        .location-list b {
            color: var(--gold);
        }

        footer {
            background: white;
            padding: 42px 0 25px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr 1fr;
            gap: 45px;
        }

        footer h3 {
            font: 600 19px "Playfair Display", serif;
            margin-bottom: 13px;
        }

        footer h4 {
            font-size: 11px;
            margin-bottom: 13px;
        }

        footer p,
        footer a {
            font-size: 10px;
            line-height: 1.9;
            color: var(--muted);
        }

        .footer-links {
            display: grid;
            gap: 5px;
        }

        .copyright {
            border-top: 1px solid var(--line);
            margin-top: 30px;
            padding-top: 17px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            color: #9a958d;
            font-size: 9px;
        }

        @media (max-width: 760px) {
            .container {
                width: min(92%, 560px);
            }

            header {
                height: auto;
                padding: 14px 0;
            }

            .nav {
                flex-wrap: wrap;
            }

            .brand-name {
                font-size: 18px;
            }

            .nav-links {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 20px;
                padding-top: 8px;
            }

            .nav-links a {
                font-size: 11px;
            }

            .nav > .btn {
                padding: 10px 14px;
                font-size: 10px;
            }

            .hero {
                min-height: auto;
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 65px 0;
            }

            .hero-image {
                height: 230px;
            }

            .service-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 13px;
            }

            .service-card img,
            .no-image {
                height: 145px;
            }

            .service-info {
                padding: 13px;
            }

            .service-info h3 {
                font-size: 16px;
            }

            .review-grid {
                grid-template-columns: 1fr;
            }

            .location-wrap {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 28px;
            }

            .footer-grid > div:first-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 420px) {
            .service-grid {
                grid-template-columns: 1fr;
            }

            .service-card img,
            .no-image {
                height: 205px;
            }

            .nav-links {
                gap: 13px;
            }

            .copyright {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <nav class="nav container">

            <a class="brand" href="#home">
                <span class="brand-mark">SF</span>
                <span class="brand-name">Studio Flawless</span>
            </a>

            <div class="nav-links">
                <a href="#home">Home</a>
                <a href="#layanan">Layanan</a>
                <a href="#testimoni">Testimoni</a>
                <a href="#lokasi">Lokasi</a>
            </div>

            @auth
                <a class="btn btn-dark"
                   href="{{ auth()->user()->isAdmin() ? route('admin.index') : route('user.index') }}">
                    Dashboard
                </a>
            @else
                <a class="btn btn-dark" href="{{ route('login') }}">
                    Masuk
                </a>
            @endauth

        </nav>
    </header>


    <main>

        <!-- HERO -->
        <section class="container hero" id="home">

            <div>
                <h1>
                    Tampil Memesona
                    <span>Tanpa Antre</span>
                </h1>

                <p>
                    Pesan perawatan kecantikan dengan mudah dan nikmati pelayanan terbaik dari Studio Flawless.
                    Saatnya manjakan diri dan tampil percaya diri setiap hari.
                </p>

                <div class="hero-actions">
                    <a class="btn btn-dark" href="#layanan">LIHAT LAYANAN</a>
                    <a class="btn btn-light" href="#lokasi">INFO &amp; LOKASI</a>
                </div>
            </div>

            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=85"
                     alt="Perawatan wajah di Studio Flawless">
            </div>

        </section>


        <!-- LAYANAN DARI DATABASE -->
        <section class="container" id="layanan">

            <h2 class="section-title">Layanan &amp; Harga</h2>

            <div class="filters" aria-label="Filter layanan">

                <button class="filter active" data-filter="all">SEMUA</button>
                <button class="filter" data-filter="wajah">WAJAH</button>
                <button class="filter" data-filter="tubuh">TUBUH &amp; SPA</button>
                <button class="filter" data-filter="kuku">KUKU &amp; MAKEUP</button>

            </div>

            <div class="service-grid">

                @forelse ($layanans as $layanan)

                    <article class="service-card"
                             data-category="{{ strtolower($layanan->kategori) }}">

                        <!-- FOTO LAYANAN -->
                        @if ($layanan->gambar)

                            <img src="{{ asset('storage/' . $layanan->gambar) }}"
                                 alt="{{ $layanan->nama_layanan }}">

                        @else

                            <div class="no-image">
                                Tidak ada foto
                            </div>

                        @endif

                        <div class="service-info">

                            <!-- KATEGORI -->
                            <span class="service-category">
                                {{ $layanan->kategori }}
                            </span>

                            <!-- NAMA LAYANAN -->
                            <h3>
                                {{ $layanan->nama_layanan }}
                            </h3>

                            <!-- HARGA -->
                            <div class="price">
                                Rp{{ number_format($layanan->harga, 0, ',', '.') }}
                            </div>

                            <!-- DESKRIPSI -->
                            <p>
                                {{ $layanan->deskripsi }}
                            </p>

                            <!-- TOMBOL DETAIL -->
                            @auth
                                <a class="detail" href="{{ route('user.layananUser') }}">
                                    Lihat Detail →
                                </a>
                            @else
                                <a class="detail" href="{{ route('login') }}">
                                    Masuk untuk Memesan →
                                </a>
                            @endauth

                        </div>

                    </article>

                @empty

                    <p style="color:#77736d; font-size:13px;">
                        Belum ada layanan yang tersedia.
                    </p>

                @endforelse

            </div>

        </section>


        <!-- TESTIMONI -->
        <section class="container reviews" id="testimoni">

            <h2 class="section-title">Suara Para Pelanggan Kami</h2>

            <div class="review-grid">

                <article class="review-card">
                    <div class="stars">★★★★★</div>
                    <p>
                        “Tempatnya nyaman dan pelayanannya ramah. Perawatannya membuat saya merasa lebih segar dan percaya diri. Pasti akan datang lagi!”
                    </p>
                    <strong>— Sarah Wijaya</strong>
                </article>

                <article class="review-card">
                    <div class="stars">★★★★★</div>
                    <p>
                        “Waktu booking sangat mudah dan pelayanannya profesional. Hasil perawatannya juga memuaskan. Saya suka suasana studionya.”
                    </p>
                    <strong>— A. Siti Aisyah, 24</strong>
                </article>

                <article class="review-card">
                    <div class="stars">★★★★★</div>
                    <p>
                        “Tempatnya bersih dan nyaman, cocok untuk me-time. Staff-nya ramah dan selalu membantu memilih perawatan yang sesuai.”
                    </p>
                    <strong>— Fania Ananda</strong>
                </article>

            </div>

            <br>

            <a style="font-size:15px;color:var(--muted);margin-top:18px;"
               class="lainnya"
               href="testimonials.html">
                Lihat Semua Testimoni →
            </a>

        </section>


        <!-- LOKASI -->
        <section class="container location" id="lokasi">

            <div class="location-wrap">

                <div class="map-placeholder">
                    <iframe title="Peta lokasi Studio Flawless"
                            src="https://www.google.com/maps?q=Jakarta&output=embed"
                            loading="lazy">
                    </iframe>
                </div>

                <div>

                    <p class="eyebrow">Kunjungi studio kami</p>

                    <h2>Lokasi &amp; Jam Operasional</h2>

                    <ul class="location-list">

                        <li>
                            <b>01</b>
                            <span>
                                <strong>Alamat Studio</strong><br>
                                Jakarta, Indonesia
                            </span>
                        </li>

                        <li>
                            <b>02</b>
                            <span>
                                <strong>Jam Operasional</strong><br>
                                Senin–Sabtu, 09.00–20.00 WIB
                            </span>
                        </li>

                        <li>
                            <b>03</b>
                            <span>
                                <strong>Hubungi Kami</strong><br>
                                Informasi dan reservasi melalui kontak Studio Flawless
                            </span>
                        </li>

                    </ul>

                    <a class="btn btn-dark"
                       href="https://www.google.com/maps/search/?api=1&query=Jakarta"
                       target="_blank"
                       rel="noopener">
                        LIHAT ARAH LOKASI
                    </a>

                </div>

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer>

        <div class="container">

            <div class="footer-grid">

                <div>
                    <h3>Studio Flawless</h3>

                    <p>
                        Temukan kenyamanan dalam setiap perawatan.
                        Kami hadir untuk membantu Anda tampil percaya diri dan merasa istimewa.
                    </p>

                    <p style="margin-top:12px;">
                        ◎ &nbsp; ◉ &nbsp; ◌
                    </p>
                </div>

                <div>
                    <h4>QUICK LINKS</h4>

                    <div class="footer-links">
                        <a href="#home">Home</a>
                        <a href="#layanan">Layanan &amp; Harga</a>
                        <a href="#testimoni">Testimoni</a>
                        <a href="#lokasi">Lokasi</a>
                    </div>
                </div>

                <div>
                    <h4>HUBUNGI KAMI</h4>
                    <p>Jakarta, Indonesia</p>
                    <p>Senin–Sabtu | 09.00–20.00 WIB</p>
                    <p>Studio Flawless</p>
                </div>

            </div>

            <div class="copyright">
                <span>© 2026 Studio Flawless. All rights reserved.</span>
                <span>Designed for your beauty &amp; confidence.</span>
            </div>

        </div>

    </footer>


    <!-- JAVASCRIPT FILTER -->
    <script>

        const filterButtons = document.querySelectorAll(".filter");
        const serviceCards = document.querySelectorAll(".service-card");

        filterButtons.forEach(button => {

            button.addEventListener("click", () => {

                // Mengubah tombol yang aktif
                filterButtons.forEach(item => {
                    item.classList.remove("active");
                });

                button.classList.add("active");

                const selected = button.dataset.filter;

                // Filter layanan berdasarkan kategori
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

</body>
</html>
