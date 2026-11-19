
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Studio Flawless</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
</head>

<body style="margin:0; padding:0; box-sizing:border-box; background:#f5f2ec; color:#25231f; font-family:'DM Sans',sans-serif;">

    <!-- HEADER -->
    <header style="height:auto; min-height:76px; background:#fff; display:flex; align-items:center; position:sticky; top:0; z-index:10; border-bottom:1px solid #e9e4dc;">

        <nav style="width:86%; max-width:1120px; margin:0 auto; display:flex; align-items:center; justify-content:space-between; gap:20px; flex-wrap:wrap; padding:12px 0;">

            <!-- LOGO -->
            <a href="{{ route('user.index') }}" style="display:flex; align-items:center; gap:10px; white-space:nowrap; color:#25231f; text-decoration:none;">

                <span style="width:39px; height:39px; border:1px solid #d8cbb7; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#b99a68; font:20px 'Playfair Display',serif;">
                    SF
                </span>

                <span style="font:600 20px 'Playfair Display',serif;">
                    Studio Flawless
                </span>

            </a>

            <!-- MENU NAVIGASI -->
            <div style="display:flex; align-items:center; justify-content:center; gap:20px; flex-wrap:wrap; font-size:12px; color:#55514b;">

                <a href="{{ route('user.index') }}"
                    style="color:inherit; text-decoration:none;">
                    Home
                </a>

                <a href="{{ route('user.layananUser') }}"
                    style="color:inherit; text-decoration:none;">
                    Layanan
                </a>

                <a href="{{ route('user.kirimPesan') }}"
                    style="color:inherit; text-decoration:none;">
                    Kontak
                </a>

                <a href="{{ route('user.pesanan') }}"
                    style="color:inherit; text-decoration:none;">
                    Pesanan Saya
                </a>

            </div>

            <!-- KERANJANG -->
            <a href="{{ route('user.keranjang') }}"
                aria-label="Lihat keranjang"
                style="position:relative; display:flex; align-items:center; gap:8px; background:#25231f; color:#fff; padding:10px 14px; border-radius:5px; font-size:11px; font-weight:700; text-decoration:none;">

                <svg viewBox="0 0 24 24"
                    aria-hidden="true"
                    style="width:17px; height:17px; stroke:currentColor; fill:none; stroke-width:1.8;">

                    <path d="M3 3h2l2.2 11.2a2 2 0 0 0 2 1.6h8.9a2 2 0 0 0 1.9-1.4L22 7H6"></path>

                    <circle cx="10" cy="20" r="1.3"></circle>

                    <circle cx="18" cy="20" r="1.3"></circle>

                </svg>

                <span>Keranjang</span>

                <!-- JUMLAH KERANJANG OTOMATIS -->
                <span id="cartCount"
                    style="position:absolute; right:-7px; top:-8px; background:#b99a68; color:#fff; border-radius:50%; min-width:18px; height:18px; display:flex; align-items:center; justify-content:center; font-size:10px; padding:0 4px;">

                    {{ collect(session('cart', []))->sum('qty') }}

                </span>

            </a>

            <!-- LOGOUT -->
            <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                @csrf

                <button type="submit"
                    style="background:none; border:none; color:#55514b; cursor:pointer; font:600 12px 'DM Sans',sans-serif;">
                    Logout
                </button>

            </form>

        </nav>

    </header>

    <!-- KONTEN HALAMAN -->
    @yield('content')


    <!-- FOOTER -->
    <footer style="background:#fff; padding:42px 0 25px;">

        <div style="width:86%; max-width:1120px; margin:0 auto;">

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:35px;">

                <!-- TENTANG -->
                <div>

                    <h3 style="font:600 19px 'Playfair Display',serif; margin:0 0 13px;">
                        Studio Flawless
                    </h3>

                    <p style="font-size:10px; line-height:1.9; color:#77736d; margin:0;">
                        Temukan kenyamanan dalam setiap perawatan. Kami hadir untuk membantu Anda tampil percaya diri dan merasa istimewa.
                    </p>

                    <p style="margin-top:12px; color:#77736d;">
                        ◎ &nbsp; ◉ &nbsp; ◌
                    </p>

                </div>

                <!-- QUICK LINKS -->
                <div>

                    <h4 style="font-size:11px; margin:0 0 13px;">
                        QUICK LINKS
                    </h4>

                    <div style="display:grid; gap:7px;">

                        <a href="{{ route('user.index') }}"
                            style="font-size:10px; line-height:1.9; color:#77736d; text-decoration:none;">
                            Home
                        </a>

                        <a href="{{ route('user.layananUser') }}"
                            style="font-size:10px; line-height:1.9; color:#77736d; text-decoration:none;">
                            Layanan &amp; Harga
                        </a>

                        <a href="{{ route('user.kirimPesan') }}"
                            style="font-size:10px; line-height:1.9; color:#77736d; text-decoration:none;">
                            Pesan
                        </a>

                        <a href="{{ route('user.keranjang') }}"
                            style="font-size:10px; line-height:1.9; color:#77736d; text-decoration:none;">
                            Keranjang
                        </a>

                    </div>

                </div>

                <!-- KONTAK -->
                <div>

                    <h4 style="font-size:11px; margin:0 0 13px;">
                        HUBUNGI KAMI
                    </h4>

                    <p style="font-size:10px; line-height:1.9; color:#77736d; margin:0;">
                        Jakarta, Indonesia
                    </p>

                    <p style="font-size:10px; line-height:1.9; color:#77736d; margin:0;">
                        Senin–Sabtu | 09.00–20.00 WIB
                    </p>

                    <p style="font-size:10px; line-height:1.9; color:#77736d; margin:0;">
                        Studio Flawless
                    </p>

                </div>

            </div>

            <!-- COPYRIGHT -->
            <div style="border-top:1px solid #e9e4dc; margin-top:30px; padding-top:17px; display:flex; justify-content:space-between; flex-wrap:wrap; gap:12px; color:#9a958d; font-size:9px;">

                <span>
                    © 2026 Studio Flawless. All rights reserved.
                </span>

                <span>
                    Designed for your beauty &amp; confidence.
                </span>

            </div>

        </div>

    </footer>

</body>
</html>
