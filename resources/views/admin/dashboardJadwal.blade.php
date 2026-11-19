@extends('layouts.app')
@section('content')
 

 <main style="flex:1; min-width:0; padding:24px 32px; background:#f5f2ec; font-family:'DM Sans', sans-serif; color:#25231f; height:100vh; overflow-y:auto;">
  
  <!-- Header Halaman -->
  <header style="height:50px; background:#fff; border:1px solid #e9e4dc; border-radius:10px; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display', serif; font-size:16px; font-weight:600; box-shadow:0 4px 12px rgba(40,30,20,.03);">
    DASHBOARD ADMIN - JADWAL & RIWAYAT
  </header>

  <!-- Action Bar / Tombol Cetak PDF -->
  <section style="margin-top:20px; background:#fff; border-radius:12px; padding:16px 20px; border:1px solid #e9e4dc; box-shadow:0 4px 12px rgba(40,30,20,.03);">
    <button type="button" onclick="window.print()" style="border:1px solid #e9e4dc; border-radius:6px; background:#fff; color:#25231f; padding:10px 16px; font-size:12px; font-weight:600; cursor:pointer; display:inline-flex; align-items:center; gap:6px; transition:all 0.2s;" onmouseover="this.style.background='#faf6f0'; this.style.borderColor='#b99a68';" onmouseout="this.style.background='#fff'; this.style.borderColor='#e9e4dc';">
      📄 Cetak PDF
    </button>
  </section>

  <!-- Tabel Data -->
  <section style="margin-top:20px; background:#fff; border-radius:12px; border:1px solid #e9e4dc; overflow:hidden; box-shadow:0 4px 12px rgba(40,30,20,.03);">
    <table style="width:100%; border-collapse:collapse; min-width:520px; text-align:left; font-size:12px;">
      <thead>
        <tr style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px;">
          <th style="padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">ID User</th>
          <th style="padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">Judul Perawatan</th>
          <th style="padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">Tanggal</th>
          <th style="padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">Bukti Pembayaran</th>
          <th style="padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700; text-align:center;">Aksi Kelola</th>
        </tr>
      </thead>
      
<tbody>
    @forelse ($bookings as $booking)
        <tr style="border-bottom:1px solid #e9e4dc;">

            {{-- ID User --}}
            <td style="padding:16px; font-weight:700; color:#25231f;">
                {{ str_pad($booking->user_id, 4, '0', STR_PAD_LEFT) }}
            </td>

            {{-- Nama Layanan --}}
            <td style="padding:16px; font-weight:600; color:#25231f;">
                @foreach ($booking->items as $item)
                    <div>{{ $item->nama_layanan }}</div>
                @endforeach
            </td>

            {{-- Tanggal dan Jam --}}
            <td style="padding:16px; color:#77736d;">
                {{ \Carbon\Carbon::parse($booking->tanggal_kunjungan)->format('d F Y') }}

                <br>

                <span style="color:#b99a68; font-weight:700; font-size:11px;">
                    {{ $booking->jam_kunjungan }}
                </span>
            </td>

            {{-- Bukti Pembayaran --}}
            <td style="padding:16px;">
                @if ($booking->bukti_pembayaran)
                    <a href="{{ asset('storage/' . $booking->bukti_pembayaran) }}"
                       target="_blank"
                       style="background:#faf6f0; color:#b99a68; border:1px solid #e9e4dc; padding:6px 12px; border-radius:6px; font-size:11px; font-weight:600; text-decoration:none;">
                        🔍 Lihat
                    </a>
                @else
                    <span style="color:#77736d;">Belum upload</span>
                @endif
            </td>

            {{-- Status Booking --}}
            <td style="padding:16px; text-align:center;">
                <span style="background:#faf6f0; color:#b99a68; padding:5px 10px; border-radius:12px; font-size:10px; font-weight:600;">
                    {{ $booking->status }}
                </span>
            </td>

        </tr>
    @empty
        <tr>
            <td colspan="5" style="padding:25px; text-align:center; color:#77736d;">
                Belum ada data booking.
            </td>
        </tr>
    @endforelse
</tbody>

    </table>
  </section>
</main>   

@endsection