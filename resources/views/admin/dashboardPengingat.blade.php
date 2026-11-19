@extends('layouts.app')

@section('content')
 <main style="flex:1; display:flex; flex-direction:column; background:#f5f2ec; height:100vh; overflow-y:auto;">

        <!-- Topbar -->
        <header style="background:#fff; padding:20px 32px; border-bottom:1px solid #e9e4dc; font:600 18px 'Playfair Display',serif;">
            Pengingat Jadwal Perawatan
        </header>


        <div style="padding:24px 32px;">

            <!-- Header Card -->
            <div style="background:#fff; border-radius:12px; padding:16px 20px; border:1px solid #e9e4dc; display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; box-shadow:0 4px 12px rgba(40,30,20,.03);">

                <div style="font-size:12px; color:#77736d;">
                    Kirimkan email pengingat kedatangan perawatan kepada pelanggan untuk hari ini.
                </div>

                <a href="#" id="printPdfBtn" style="background:#fff; color:#25231f; border:1px solid #e9e4dc; border-radius:6px; padding:10px 16px; font:600 12px 'DM Sans',sans-serif; cursor:pointer; display:inline-flex; align-items:center; gap:6px; text-decoration:none;">
                    📄 Cetak Daftar Pengingat
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
                                Jenis Perawatan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Jam Kunjungan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Aksi Kelola
                            </th>

                        </tr>
                    </thead>

                    
<tbody>
    @forelse ($bookings as $booking)
        <tr>

            {{-- Nama Pelanggan --}}
            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; color:#25231f;">
                <strong>{{ $booking->user->name ?? 'Nama tidak tersedia' }}</strong>
            </td>

            {{-- Jenis Perawatan --}}
            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc; color:#25231f;">
                @foreach ($booking->items as $item)
                    <span style="background:#faf6f0; color:#b99a68; padding:4px 8px; border-radius:4px; font-size:10px; font-weight:600; display:inline-block; margin-bottom:4px;">
                        {{ $item->nama_layanan }}
                    </span>
                @endforeach
            </td>

            {{-- Jam Kunjungan --}}
            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">
                <span style="font-weight:700; color:#25231f; background:#f0ebe1; padding:4px 8px; border-radius:4px; font-size:11px;">
                    {{ $booking->jam_kunjungan }}
                </span>
            </td>

            {{-- Kirim Pengingat --}}
            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">

                @if ($booking->user && $booking->user->email)
                    <a href="mailto:{{ $booking->user->email }}?subject=Pengingat%20Jadwal%20Perawatan"
                       style="background:#b99a68; color:#fff; border-radius:6px; padding:8px 14px; font:600 11px 'DM Sans',sans-serif; text-decoration:none; display:inline-flex; align-items:center; gap:6px;">
                        ✉️ Kirim Pengingat
                    </a>
                @else
                    <span style="color:#77736d;">Email tidak tersedia</span>
                @endif

            </td>

        </tr>
    @empty
        <tr>
            <td colspan="4" style="padding:25px; text-align:center; color:#77736d;">
                Tidak ada jadwal perawatan untuk hari ini.
            </td>
        </tr>
    @endforelse
</tbody>


                </table>

            </div>

        </div>

    </main>
@endsection