


<div style="min-height:100vh; background:#f5f2ec; display:flex; justify-content:center; align-items:center; padding:30px;">

    <div style="background:#fff; border-radius:12px; box-shadow:0 10px 30px rgba(40,30,20,.08); width:100%; max-width:520px; padding:28px; border:1px solid #e9e4dc;">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; border-bottom:1px solid #e9e4dc; padding-bottom:16px;">
            <h2 style="font:600 20px 'Playfair Display',serif; color:#25231f; margin:0;">
                Tambah Perawatan Baru
            </h2>

            <a href="{{ route('admin.dashboardLayanan') }}" style="font-size:24px; color:#77736d; text-decoration:none;">
                &times;
            </a>
        </div>

        @if ($errors->any())
            <div style="background:#fff0f0; color:#b42318; padding:12px; border-radius:6px; margin-bottom:15px; font-size:12px;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:11px; font-weight:700; color:#77736d; margin-bottom:6px;">NAMA PERAWATAN</label>
                <input type="text" name="nama_layanan" value="{{ old('nama_layanan') }}" placeholder="Contoh: Hair Spa" required
                    style="width:100%; padding:12px; border:1px solid #e9e4dc; border-radius:8px; box-sizing:border-box;">
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:11px; font-weight:700; color:#77736d; margin-bottom:6px;">KATEGORI</label>
                <select name="kategori" required
                    style="width:100%; padding:12px; border:1px solid #e9e4dc; border-radius:8px; box-sizing:border-box;">
                    <option value="">Pilih Kategori</option>
                    <option value="wajah" {{ old('kategori') == 'wajah' ? 'selected' : '' }}>Perawatan Wajah</option>
                    <option value="tubuh" {{ old('kategori') == 'tubuh' ? 'selected' : '' }}>Perawatan Tubuh & Spa</option>
                    <option value="kuku" {{ old('kategori') == 'kuku' ? 'selected' : '' }}>Kuku & Makeup</option>
                </select>
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:11px; font-weight:700; color:#77736d; margin-bottom:6px;">KETERANGAN</label>
                <textarea name="deskripsi" rows="3" placeholder="Masukkan deskripsi layanan..."
                    style="width:100%; padding:12px; border:1px solid #e9e4dc; border-radius:8px; box-sizing:border-box;">{{ old('deskripsi') }}</textarea>
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:11px; font-weight:700; color:#77736d; margin-bottom:6px;">HARGA LAYANAN</label>
                <input type="number" name="harga" value="{{ old('harga') }}" placeholder="Contoh: 120000" min="0" required
                    style="width:100%; padding:12px; border:1px solid #e9e4dc; border-radius:8px; box-sizing:border-box;">
                <small style="color:#77736d;">Masukkan angka saja, tanpa Rp atau titik.</small>
            </div>

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:11px; font-weight:700; color:#77736d; margin-bottom:6px;">FOTO KATALOG</label>
                <input type="file" name="gambar" accept="image/png,image/jpeg"
                    style="width:100%; padding:10px; border:1px solid #e9e4dc; border-radius:8px; box-sizing:border-box;">
            </div>

            <div style="display:flex; gap:10px; margin-top:24px;">
                <a href="{{ route('admin.dashboardLayanan') }}"
                    style="flex:1; padding:14px; text-align:center; text-decoration:none; color:#25231f; border:1px solid #e9e4dc; border-radius:8px; box-sizing:border-box;">
                    Batal
                </a>

                <button type="submit"
                    style="flex:1; padding:14px; background:#b99a68; color:white; border:0; border-radius:8px; font-weight:700; cursor:pointer;">
                    Tambah Perawatan
                </button>
            </div>
        </form>
    </div>
</div>


