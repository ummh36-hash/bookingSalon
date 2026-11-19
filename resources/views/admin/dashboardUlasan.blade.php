@extends('layouts.app')
@section('content')
     <!-- Main Content -->
    <main style="flex:1; display:flex; flex-direction:column; background:#f5f2ec; height:100vh; overflow-y:auto;">

        <header style="background:#fff; padding:20px 32px; border-bottom:1px solid #e9e4dc; font:600 18px 'Playfair Display',serif;">
            Ulasan & Rating Pengguna
        </header>

        <div style="padding:24px 32px;">

            <!-- Action Bar -->
            <div style="background:#fff; border-radius:12px; padding:16px 20px; border:1px solid #e9e4dc; display:flex; justify-content:flex-start; align-items:center; margin-bottom:20px; box-shadow:0 4px 12px rgba(40,30,20,.03);">

                <a href="#" id="printPdfBtn" style="background:#fff; color:#25231f; border:1px solid #e9e4dc; border-radius:6px; padding:10px 16px; font:600 12px 'DM Sans',sans-serif; cursor:pointer; display:inline-flex; align-items:center; gap:6px; text-decoration:none;">
                    📄 Cetak PDF Ulasan
                </a>

            </div>

            <!-- Table Container -->
            <div style="background:#fff; border-radius:12px; border:1px solid #e9e4dc; overflow:hidden; box-shadow:0 4px 12px rgba(40,30,20,.03);">

                <table style="width:100%; border-collapse:collapse; text-align:left; font-size:12px;">

                    <thead>
                        <tr>
                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Nama Pelanggan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Layanan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Rating
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Komentar / Ulasan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Aksi Kelola
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Ulasan 1 -->
                        <tr>
                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <strong>Umamah</strong>
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <span style="background:#faf6f0; color:#b99a68; padding:4px 8px; border-radius:4px; font-size:10px; font-weight:600; display:inline-block;">
                                    Nail Art & Gel Polish
                                </span>
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <div style="color:#f59e0b; font-size:14px; letter-spacing:2px;">
                                    ★★★★★
                                </div>
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                Hasilnya rapi banget, tahan lama, dan tempatnya bersih serta nyaman!
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <div style="display:flex; gap:6px;">
                                    <a href="#" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');" style="background:none; border:1px solid #e9e4dc; border-radius:4px; width:28px; height:28px; display:grid; place-items:center; cursor:pointer; color:#77736d; text-decoration:none; font-size:12px;">
                                        🗑️
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- Ulasan 2 -->
                        <tr>
                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <strong>Nabila</strong>
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <span style="background:#faf6f0; color:#b99a68; padding:4px 8px; border-radius:4px; font-size:10px; font-weight:600; display:inline-block;">
                                    Hair Cut & Styling
                                </span>
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <div style="color:#f59e0b; font-size:14px; letter-spacing:2px;">
                                    ★★★★☆
                                </div>
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                Stylist-nya ramah dan mengerti model rambut yang kuinginkan. Recommended!
                            </td>

                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <div style="display:flex; gap:6px;">
                                    <a href="#" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');" style="background:none; border:1px solid #e9e4dc; border-radius:4px; width:28px; height:28px; display:grid; place-items:center; cursor:pointer; color:#77736d; text-decoration:none; font-size:12px;">
                                        🗑️
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- Ulasan 3 -->
                        <tr>
                            <td style="padding:14px 16px; border-bottom:none; vertical-align:middle; color:#25231f;">
                                <strong>Ayudhia</strong>
                            </td>

                            <td style="padding:14px 16px; border-bottom:none; vertical-align:middle; color:#25231f;">
                                <span style="background:#faf6f0; color:#b99a68; padding:4px 8px; border-radius:4px; font-size:10px; font-weight:600; display:inline-block;">
                                    Classic Manicure & Pedicure
                                </span>
                            </td>

                            <td style="padding:14px 16px; border-bottom:none; vertical-align:middle; color:#25231f;">
                                <div style="color:#f59e0b; font-size:14px; letter-spacing:2px;">
                                    ★★★★★
                                </div>
                            </td>

                            <td style="padding:14px 16px; border-bottom:none; vertical-align:middle; color:#25231f;">
                                Suka banget sama pelayanannya, kuku jadi bersih dan keliatan sehat.
                            </td>

                            <td style="padding:14px 16px; border-bottom:none; vertical-align:middle; color:#25231f;">
                                <div style="display:flex; gap:6px;">
                                    <a href="#" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');" style="background:none; border:1px solid #e9e4dc; border-radius:4px; width:28px; height:28px; display:grid; place-items:center; cursor:pointer; color:#77736d; text-decoration:none; font-size:12px;">
                                        🗑️
                                    </a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </main>

    <script>
        // Fungsi Tombol Cetak PDF
        document.getElementById('printPdfBtn').addEventListener('click', (e) => {
            e.preventDefault();
            window.print();
        });
    </script>
@endsection