@extends('layouts.app')

@section('content')
<!-- Main Content -->
    <main style="flex:1; min-width:0; display:flex; flex-direction:column; background:#f5f2ec; height:100vh; overflow-y:auto;">
        <header style="background:#fff; padding:20px 32px; border-bottom:1px solid #e9e4dc; font:600 18px 'Playfair Display',serif;">Beranda Dashboard Admin</header>

        <div style="padding:24px 32px;">
            <!-- Top 3 Stat Cards -->
            <div style="display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:20px; margin-bottom:24px;">
                <div style="background:#fff; border-radius:12px; padding:20px; border:1px solid #e9e4dc; box-shadow:0 4px 12px rgba(40,30,20,.03); position:relative;">
                    <div style="position:absolute; top:20px; right:20px; width:28px; height:28px; background:#faf6f0; border-radius:6px; display:grid; place-items:center; color:#b99a68; font-size:12px;">📈</div>
                    <div style="font-size:10px; text-transform:uppercase; color:#77736d; letter-spacing:1px; font-weight:700; margin-bottom:8px;">Total Pendapatan Bulan Ini</div>
                    <div style="font-family:'Playfair Display',serif; font-size:24px; font-weight:700; color:#25231f; margin-bottom:12px;">Rp 48.650.000</div>
                    <div style="font-size:11px; color:#77736d; display:flex; align-items:center; gap:6px; border-top:1px solid #e9e4dc; padding-top:10px;"><span style="color:#137333; font-weight:600;">▲ +14.2%</span> dari Rp 42.600.000 bulan lalu</div>
                </div>

                <div style="background:#fff; border-radius:12px; padding:20px; border:1px solid #e9e4dc; box-shadow:0 4px 12px rgba(40,30,20,.03); position:relative;">
                    <div style="position:absolute; top:20px; right:20px; width:28px; height:28px; background:#faf6f0; border-radius:6px; display:grid; place-items:center; color:#b99a68; font-size:12px;">✨</div>
                    <div style="font-size:10px; text-transform:uppercase; color:#77736d; letter-spacing:1px; font-weight:700; margin-bottom:8px;">Perawatan Terlaksana</div>
                    <div style="font-family:'Playfair Display',serif; font-size:24px; font-weight:700; color:#25231f; margin-bottom:12px;">342 Sesi</div>
                    <div style="font-size:11px; color:#77736d; display:flex; align-items:center; gap:6px; border-top:1px solid #e9e4dc; padding-top:10px;"><span style="color:#137333; font-weight:600;">▲ +5.8%</span> tingkat kepuasan tinggi (5.0)</div>
                </div>

                <div style="background:#fff; border-radius:12px; padding:20px; border:1px solid #e9e4dc; box-shadow:0 4px 12px rgba(40,30,20,.03); position:relative;">
                    <div style="position:absolute; top:20px; right:20px; width:28px; height:28px; background:#faf6f0; border-radius:6px; display:grid; place-items:center; color:#b99a68; font-size:12px;">👥</div>
                    <div style="font-size:10px; text-transform:uppercase; color:#77736d; letter-spacing:1px; font-weight:700; margin-bottom:8px;">Member &amp; Pelanggan Baru</div>
                    <div style="font-family:'Playfair Display',serif; font-size:24px; font-weight:700; color:#25231f; margin-bottom:12px;">224 <span style="font-size:16px; color:#77736d; font-weight:400;">/ 118</span></div>
                    <div style="font-size:11px; color:#77736d; display:flex; align-items:center; gap:6px; border-top:1px solid #e9e4dc; padding-top:10px;"><span>Baru</span> &bull; <span>118 Repeat Client</span></div>
                </div>
            </div>

            <!-- Bottom Section: Chart & Distribution -->
            <div style="display:grid; grid-template-columns:2fr 1fr; gap:20px;">
                <!-- Left: Tren Omset Harian -->
                <div style="background:#fff; border-radius:12px; padding:24px; border:1px solid #e9e4dc; box-shadow:0 4px 12px rgba(40,30,20,.03);">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                        <div>
                            <div style="font:600 16px 'Playfair Display',serif;">Tren Omset Harian (1 - 21 Maret)</div>
                            <div style="font-size:11px; color:#77736d;">Statistik pemasukan berkala salon</div>
                        </div>
                    </div>

                    <div style="height:180px; display:flex; align-items:flex-end; position:relative; padding-bottom:20px; border-bottom:1px solid #e9e4dc; margin-bottom:16px;">
                        <svg style="width:100%; height:120px; overflow:visible;" viewBox="0 0 500 120" preserveAspectRatio="none">
                            <path d="M 0,90 Q 60,70 120,80 T 240,40 T 360,60 T 480,35" fill="none" stroke="#b99a68" stroke-width="3"/>
                            <path d="M 0,90 Q 60,70 120,80 T 240,40 T 360,60 T 480,35 L 480,120 L 0,120 Z" fill="#faf6f0" opacity="0.5"/>
                            <circle cx="120" cy="80" r="4" fill="#b99a68"/>
                            <circle cx="240" cy="40" r="4" fill="#b99a68"/>
                            <circle cx="360" cy="60" r="4" fill="#b99a68"/>
                            <circle cx="480" cy="35" r="4" fill="#b99a68"/>
                        </svg>
                    </div>

                    <div style="display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:10px; background:#faf8f5; padding:12px; border-radius:8px; border:1px solid #e9e4dc;">
                        <div>
                            <label style="font-size:9px; color:#77736d; text-transform:uppercase; display:block; margin-bottom:2px;">Hari Tertinggi</label>
                            <div style="font-size:12px; font-weight:700; color:#25231f;">14 Maret (Rp 3.400.000)</div>
                        </div>
                        <div>
                            <label style="font-size:9px; color:#77736d; text-transform:uppercase; display:block; margin-bottom:2px;">Weekend vs Weekday</label>
                            <div style="font-size:12px; font-weight:700; color:#25231f;">+30% Trafik Sabtu - Minggu</div>
                        </div>
                        <div>
                            <label style="font-size:9px; color:#77736d; text-transform:uppercase; display:block; margin-bottom:2px;">Waktu Terfavorit</label>
                            <div style="font-size:12px; font-weight:700; color:#25231f;">13.00 - 17.00 WIB</div>
                        </div>
                    </div>
                </div>

                <!-- Right: Distribusi Kategori -->
                <div style="background:#fff; border-radius:12px; padding:24px; border:1px solid #e9e4dc; box-shadow:0 4px 12px rgba(40,30,20,.03); display:flex; flex-direction:column; align-items:center;">
                    <div style="font:600 16px 'Playfair Display',serif; align-self:flex-start; margin-bottom:4px;">Distribusi Kategori</div>
                    <div style="font-size:11px; color:#77736d; align-self:flex-start;">Persentase layanan terlaris</div>

                    <div style="width:110px; height:110px; border-radius:50%; background:conic-gradient(#b99a68 0% 45%, #d4c5ab 45% 75%, #e6dccb 75% 90%, #f0ebe1 90% 100%); display:grid; place-items:center; margin:15px 0; position:relative;">
                        <div style="width:80px; height:80px; background:#fff; border-radius:50%; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                            <div style="font-family:'Playfair Display',serif; font-size:16px; font-weight:700;">342</div>
                            <div style="font-size:8px; color:#77736d; text-transform:uppercase;">Layanan</div>
                        </div>
                    </div>

                    <div style="width:100%; display:flex; flex-direction:column; gap:8px; margin-top:10px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:11px; background:#faf8f5; padding:6px 10px; border-radius:6px; border:1px solid #e9e4dc;">
                            <div style="display:flex; align-items:center; gap:6px; color:#25231f; font-weight:500;"><span style="width:8px; height:8px; border-radius:50%; background:#b99a68;"></span>Hair Cut &amp; Styling</div>
                            <div style="font-weight:700; color:#77736d;">38% (130)</div>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:11px; background:#faf8f5; padding:6px 10px; border-radius:6px; border:1px solid #e9e4dc;">
                            <div style="display:flex; align-items:center; gap:6px; color:#25231f; font-weight:500;"><span style="width:8px; height:8px; border-radius:50%; background:#d4c5ab;"></span>Facial &amp; Skin Care</div>
                            <div style="font-weight:700; color:#77736d;">28% (96)</div>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:11px; background:#faf8f5; padding:6px 10px; border-radius:6px; border:1px solid #e9e4dc;">
                            <div style="display:flex; align-items:center; gap:6px; color:#25231f; font-weight:500;"><span style="width:8px; height:8px; border-radius:50%; background:#e6dccb;"></span>Hair Color &amp; Balayage</div>
                            <div style="font-weight:700; color:#77736d;">22% (75)</div>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:11px; background:#faf8f5; padding:6px 10px; border-radius:6px; border:1px solid #e9e4dc;">
                            <div style="display:flex; align-items:center; gap:6px; color:#25231f; font-weight:500;"><span style="width:8px; height:8px; border-radius:50%; background:#f0ebe1;"></span>Manicure &amp; Nail Buffing</div>
                            <div style="font-weight:700; color:#77736d;">12% (41)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection