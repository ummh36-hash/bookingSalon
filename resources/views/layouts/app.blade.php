
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Flawless - Dashboard Utama Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Styling Menu Sidebar */
        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
            color: #77736d;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        /* Efek ketika kursor diarahkan */
        .menu-link:hover {
            background: #faf6f0;
            color: #b99a68;
            font-weight: 600;
        }

        /* Menu yang sedang dibuka */
        .menu-link.active {
            background: #faf6f0;
            color: #b99a68;
            font-weight: 600;
        }
    </style>
</head>

<body style="box-sizing:border-box; margin:0; padding:0; background:#f5f2ec; color:#25231f; font-family:'DM Sans',sans-serif; min-height:100vh; display:flex;">

    <!-- Sidebar -->
    <aside style="width:260px; flex-shrink:0; background:#fff; border-right:1px solid #e9e4dc; display:flex; flex-direction:column; padding:24px 16px; justify-content:space-between; box-sizing:border-box;">

        <div>

            <!-- Brand -->
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:24px; padding-left:8px;">

                <div style="width:32px; height:32px; border-radius:50%; background:#b99a68; display:grid; place-items:center; color:#fff; font-family:'Playfair Display',serif; font-weight:700;">
                    SF
                </div>

                <div style="font:600 16px 'Playfair Display',serif;">
                    Studio Flawless
                </div>

            </div>

            <!-- Menu Sidebar -->
            <ul style="list-style:none; margin:0; padding:0; display:flex; flex-direction:column; gap:4px;">

                <!-- Beranda -->
                <li>
                    <a href="{{ route('admin.index') }}"
                       class="menu-link {{ request()->is(trim(parse_url(route('admin.index'), PHP_URL_PATH), '/')) ? 'active' : '' }}">
                        📊 Beranda
                    </a>
                </li>

                <!-- Layanan & Harga -->
                <li>
                    <a href="{{ route('admin.dashboardLayanan') }}"
                       class="menu-link {{ request()->is(trim(parse_url(route('admin.dashboardLayanan'), PHP_URL_PATH), '/')) ? 'active' : '' }}">
                        🏷️ Layanan &amp; Harga
                    </a>
                </li>

                <!-- Jadwal & Riwayat -->
                <li>
                    <a href="{{ route('admin.dashboardJadwal') }}"
                       class="menu-link {{ request()->is(trim(parse_url(route('admin.dashboardJadwal'), PHP_URL_PATH), '/')) ? 'active' : '' }}">
                        📅 Jadwal &amp; Riwayat
                    </a>
                </li>

                <!-- Ulasan User -->
                <li>
                    <a href="{{ route('admin.dashboardUlasan') }}"
                       class="menu-link {{ request()->is(trim(parse_url(route('admin.dashboardUlasan'), PHP_URL_PATH), '/')) ? 'active' : '' }}">
                        💬 Ulasan User
                    </a>
                </li>

                <!-- Pengingat -->
                <li>
                    <a href="{{ route('admin.dashboardPengingat') }}"
                       class="menu-link {{ request()->is(trim(parse_url(route('admin.dashboardPengingat'), PHP_URL_PATH), '/')) ? 'active' : '' }}">
                        🔔 Pengingat
                    </a>
                </li>

                <!-- Kotak Masuk Pesan -->
                <li>
                    <a href="{{ route('admin.dashboardPesan') }}"
                       class="menu-link {{ request()->is(trim(parse_url(route('admin.dashboardPesan'), PHP_URL_PATH), '/')) ? 'active' : '' }}">
                        📥 Kotak Masuk Pesan
                    </a>
                </li>

            </ul>

        </div>

        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" style="background:none; border:1px solid #e9e4dc; border-radius:8px; padding:10px; width:100%; text-align:left; cursor:pointer; color:#77736d; font-size:13px; font-weight:500; display:flex; align-items:center; gap:10px;">
                🚪 Keluar
            </button>
        </form>

    </aside>

    <!-- Main Content -->
    @yield('content')

</body>
</html>
