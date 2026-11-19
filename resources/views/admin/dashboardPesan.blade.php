
@extends('layouts.app')

@section('content')

<main style="flex:1; display:flex; flex-direction:column; background:#f5f2ec; height:100vh; overflow-y:auto;">

    <header style="background:#fff; padding:20px 32px; border-bottom:1px solid #e9e4dc; font:600 18px 'Playfair Display',serif;">
        Kotak Masuk Pesan Pelanggan
    </header>

    <div style="padding:24px 32px;">

        <!-- Header Card -->
        <div style="background:#fff; border-radius:12px; padding:16px 20px; border:1px solid #e9e4dc; display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; box-shadow:0 4px 12px rgba(40,30,20,.03);">

            <div style="font-size:12px; color:#77736d;">
                Daftar pertanyaan atau pesan yang dikirimkan oleh pengguna melalui aplikasi.
            </div>

            <a href="#" id="printPdfBtn" style="background:#fff; color:#25231f; border:1px solid #e9e4dc; border-radius:6px; padding:10px 16px; font:600 12px 'DM Sans',sans-serif; cursor:pointer; display:inline-flex; align-items:center; gap:6px; text-decoration:none;">
                📄 Cetak Laporan Pesan
            </a>

        </div>

        <!-- Notifikasi -->
        @if (session('success'))
            <div style="background:#eaf7ed; color:#26733b; border:1px solid #ccebd3; padding:12px 16px; border-radius:8px; margin-bottom:18px; font-size:13px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Container -->
        <div style="background:#fff; border-radius:12px; border:1px solid #e9e4dc; overflow:hidden; box-shadow:0 4px 12px rgba(40,30,20,.03);">

            <table style="width:100%; border-collapse:collapse; text-align:left; font-size:12px;">

                <thead>
                    <tr>
                        <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                            Nama
                        </th>

                        <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                            Kategori
                        </th>

                        <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                            Pesan
                        </th>

                        <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                            Status
                        </th>

                        <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($pesans as $pesan)

                        <tr>
                            <!-- Nama -->
                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <strong>{{ $pesan->nama }}</strong>
                            </td>

                            <!-- Kategori -->
                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                <span style="background:#faf6f0; color:#b99a68; padding:4px 8px; border-radius:4px; font-size:10px; font-weight:600; display:inline-block;">
                                    {{ $pesan->kategori }}
                                </span>
                            </td>

                            <!-- Pesan -->
                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle; color:#25231f;">
                                {{ $pesan->deskripsi }}
                            </td>

                            <!-- Status -->
                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle;">

                                @if (!empty($pesan->balasan))

                                    <span style="background:#eaf7ed; color:#26733b; padding:6px 10px; border-radius:20px; font-size:10px; font-weight:700; display:inline-block;">
                                        ✓ Sudah Dibalas
                                    </span>

                                @else

                                    <span style="background:#fff4df; color:#a66b16; padding:6px 10px; border-radius:20px; font-size:10px; font-weight:700; display:inline-block;">
                                        ● Belum Dibalas
                                    </span>

                                @endif

                            </td>

                            <!-- Aksi -->
                            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; vertical-align:middle;">

                                @if (!empty($pesan->balasan))

                                    <a href="{{ route('admin.balasPesan', $pesan->id) }}"
                                       style="background:#eaf7ed; color:#26733b; border:1px solid #ccebd3; border-radius:6px; padding:8px 12px; font:600 11px 'DM Sans',sans-serif; text-decoration:none; display:inline-flex; align-items:center; justify-content:center; gap:6px;">
                                        ✓ Lihat Balasan
                                    </a>

                                @else

                                    <a href="{{ route('admin.balasPesan', $pesan->id) }}"
                                       style="background:#b99a68; color:#fff; border-radius:6px; padding:8px 16px; font:600 11px 'DM Sans',sans-serif; text-decoration:none; display:inline-flex; align-items:center; justify-content:center; gap:6px;">
                                        💬 Balas
                                    </a>

                                @endif

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" style="padding:25px; text-align:center; color:#77736d;">
                                Belum ada pesan dari pelanggan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</main>

<script>
    // Fungsi Cetak Laporan
    document.getElementById('printPdfBtn').addEventListener('click', function(e) {
        e.preventDefault();
        window.print();
    });
</script>

@endsection
