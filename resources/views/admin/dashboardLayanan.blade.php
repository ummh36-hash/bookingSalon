@extends('layouts.app')

@section('content')
      <!-- Main Content -->
    <main style="flex:1; display:flex; flex-direction:column; background:#f5f2ec; height:100vh; overflow-y:auto;">

        <header style="background:#fff; padding:20px 32px; border-bottom:1px solid #e9e4dc; font:600 18px 'Playfair Display',serif;">
            Layanan & Harga
        </header>

        <div style="padding:24px 32px;">

            <!-- Action Bar -->
            <div style="background:#fff; border-radius:12px; padding:16px 20px; border:1px solid #e9e4dc; display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; box-shadow:0 4px 12px rgba(40,30,20,.03);">

                <a href="#" id="printPdfBtn" style="background:#fff; color:#25231f; border:1px solid #e9e4dc; border-radius:6px; padding:10px 16px; font:600 12px 'DM Sans',sans-serif; cursor:pointer; display:inline-flex; align-items:center; gap:6px; text-decoration:none;">
                    📄 Cetak PDF
                </a>

                <a href="{{ route('admin.tambahLayanan') }}" style="background:#b99a68; color:#fff; border:none; border-radius:6px; padding:10px 16px; font:600 12px 'DM Sans',sans-serif; cursor:pointer; display:inline-flex; align-items:center; gap:6px; text-decoration:none;">
                    + Tambah Perawatan Baru
                </a>

            </div>


            <!-- Table Container -->
            <div style="background:#fff; border-radius:12px; border:1px solid #e9e4dc; overflow:hidden; box-shadow:0 4px 12px rgba(40,30,20,.03);">

                <table style="width:100%; border-collapse:collapse; text-align:left; font-size:12px;">

                    <thead>
                        <tr>
                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Foto Katalog
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Nama Perawatan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Kategori
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Keterangan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Harga Layanan
                            </th>

                            <th style="background:#faf8f5; color:#77736d; font-size:10px; text-transform:uppercase; letter-spacing:1px; padding:14px 16px; border-bottom:1px solid #e9e4dc; font-weight:700;">
                                Aksi Kelola
                            </th>
                        </tr>
                    </thead>

                    
<tbody>
    @forelse ($layanans as $layanan)
        <tr>
            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">
                @if ($layanan->gambar)
                    <img src="{{ asset('storage/' . $layanan->gambar) }}"
                         alt="{{ $layanan->nama_layanan }}"
                         style="width:40px; height:40px; border-radius:6px; object-fit:cover;">
                @else
                    <span>Tidak ada foto</span>
                @endif
            </td>

            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">
                <strong>{{ $layanan->nama_layanan }}</strong>
            </td>

            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">
                {{ $layanan->kategori }}
            </td>

            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">
                {{ $layanan->deskripsi }}
            </td>

            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">
                Rp {{ number_format($layanan->harga, 0, ',', '.') }}
            </td>

            <td style="padding:14px 16px; border-bottom:1px solid #e9e4dc;">
                <div style="display:flex; gap:6px;">

                    <a href="{{ route('admin.layanan.edit', $layanan->id) }}"
                       title="Edit"
                       style="border:1px solid #e9e4dc; padding:6px; text-decoration:none;">
                        ✏️
                    </a>

                    <form action="{{ route('admin.layanan.destroy', $layanan->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus layanan ini?');">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            style="border:1px solid #e9e4dc; padding:6px; cursor:pointer;">
                            🗑️
                        </button>
                    </form>

                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" style="text-align:center; padding:25px; color:#77736d;">
                Belum ada layanan yang ditambahkan.
            </td>
        </tr>
    @endforelse
</tbody>

                </table>

            </div>
        </div>
    </main>
@endsection