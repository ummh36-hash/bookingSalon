
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balas Pesan - Studio Flawless</title>
</head>

<body style="margin:0; padding:30px 15px; min-height:100vh; box-sizing:border-box; background:#f5f2ec; font-family:Arial,sans-serif; display:flex; justify-content:center; align-items:center; color:#333;">

    <div style="width:100%; max-width:750px; background:white; padding:35px; box-sizing:border-box; border-radius:15px; box-shadow:0 4px 20px rgba(0,0,0,0.04);">

        <div style="margin-bottom:28px;">
            <h2 style="font-size:23px; margin:0 0 9px; color:#292929;">
                Balas Pesan Pelanggan
            </h2>

            <p style="font-size:13px; color:#999; margin:0; line-height:1.6;">
                Berikan tanggapan atas pertanyaan yang dikirimkan oleh pelanggan.
            </p>
        </div>

        <form action="{{ route('admin.kirimBalasan', $pesan->id) }}" method="POST">
            @csrf

            <!-- NAMA -->
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:13px; font-weight:bold; margin-bottom:9px;">
                    Nama Pelanggan
                </label>

                <input type="text" value="{{ $pesan->nama }}" readonly
                    style="width:100%; padding:14px; box-sizing:border-box; border:1px solid #eee; border-radius:8px; background:#faf9f7; font-size:13px; color:#555;">
            </div>

            <!-- EMAIL -->
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:13px; font-weight:bold; margin-bottom:9px;">
                    Email Pelanggan
                </label>

                <input type="email" value="{{ $pesan->user?->email ?? 'Email tidak ditemukan' }}" readonly
                    style="width:100%; padding:14px; box-sizing:border-box; border:1px solid #eee; border-radius:8px; background:#faf9f7; font-size:13px; color:#555;">
            </div>

            <!-- KATEGORI -->
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:13px; font-weight:bold; margin-bottom:9px;">
                    Kategori
                </label>

                <input type="text" value="{{ $pesan->kategori }}" readonly
                    style="width:100%; padding:14px; box-sizing:border-box; border:1px solid #eee; border-radius:8px; background:#faf9f7; font-size:13px; color:#555;">
            </div>

            <!-- PERTANYAAN -->
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:13px; font-weight:bold; margin-bottom:9px;">
                    Pertanyaan Pelanggan
                </label>

                <textarea rows="3" readonly
                    style="width:100%; padding:14px; box-sizing:border-box; border:1px solid #eee; border-radius:8px; background:#faf9f7; font-size:13px; color:#555; resize:none; font-family:Arial; line-height:1.6;">{{ $pesan->deskripsi }}</textarea>
            </div>

            <!-- BALASAN -->
            <div style="margin-bottom:28px;">
                <label style="display:block; font-size:13px; font-weight:bold; margin-bottom:9px;">
                    Balasan Anda
                </label>

                <textarea name="balasan" rows="5" required
                    placeholder="Tuliskan balasan Anda kepada pelanggan..."
                    style="width:100%; padding:14px; box-sizing:border-box; border:1px solid #ddd; border-radius:8px; font-size:13px; font-family:Arial; resize:vertical; outline:none; line-height:1.6;">{{ old('balasan', $pesan->balasan) }}</textarea>

                @error('balasan')
                    <p style="color:red; font-size:12px;">{{ $message }}</p>
                @enderror
            </div>

            <!-- TOMBOL -->
            <div style="display:flex; justify-content:flex-end; gap:12px; flex-wrap:wrap;">

                <a href="{{ route('admin.dashboardPesan') }}"
                    style="padding:12px 23px; background:white; border:1px solid #ddd; border-radius:8px; color:#777; font-size:13px; text-decoration:none;">
                    Batal
                </a>

                <button type="submit"
                    style="padding:12px 25px; background:#bd9d69; border:none; border-radius:8px; color:white; font-size:13px; font-weight:bold; cursor:pointer;">
                    ✉ Kirim Balasan
                </button>

            </div>

        </form>

    </div>

</body>
</html>
