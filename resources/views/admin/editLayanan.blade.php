
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan - Studio Flawless</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f5f2ec; padding:40px; color:#25231f;">

    <div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:12px;">

        <h2>Edit Layanan</h2>

        <form action="{{ route('admin.layanan.update', $layanan->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label>Nama Layanan</label>
            <input type="text" name="nama_layanan"
                value="{{ old('nama_layanan', $layanan->nama_layanan) }}"
                required
                style="width:100%; padding:10px; margin:8px 0 18px; box-sizing:border-box;">

            <label>Kategori</label>
            <select name="kategori" required
                style="width:100%; padding:10px; margin:8px 0 18px;">
                <option value="wajah" {{ $layanan->kategori == 'wajah' ? 'selected' : '' }}>Wajah</option>
                <option value="tubuh" {{ $layanan->kategori == 'tubuh' ? 'selected' : '' }}>Tubuh</option>
                <option value="kuku" {{ $layanan->kategori == 'kuku' ? 'selected' : '' }}>Kuku</option>
            </select>

            <label>Deskripsi</label>
            <textarea name="deskripsi"
                style="width:100%; padding:10px; margin:8px 0 18px; box-sizing:border-box;">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>

            <label>Harga</label>
            <input type="number" name="harga"
                value="{{ old('harga', $layanan->harga) }}"
                required
                style="width:100%; padding:10px; margin:8px 0 18px; box-sizing:border-box;">

            <label>Gambar Saat Ini</label><br>

            @if ($layanan->gambar)
                <img src="{{ asset('storage/' . $layanan->gambar) }}"
                     width="120"
                     style="margin:10px 0;"><br>
            @endif

            <label>Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar"
                style="display:block; margin:10px 0 20px;">

            <button type="submit"
                style="background:#b99a68; color:white; padding:12px 25px; border:0; border-radius:6px; cursor:pointer;">
                Simpan Perubahan
            </button>

            <a href="{{ route('admin.dashboardLayanan') }}"
               style="margin-left:10px; color:#77736d;">
                Batal
            </a>

        </form>
    </div>

</body>
</html>
