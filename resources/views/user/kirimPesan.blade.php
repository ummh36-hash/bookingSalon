@extends('layouts.customer')
@section('content')

 <!-- FORM KIRIM PESAN -->
    <section id="keranjang" style="width: min(900px,86%); margin:5px auto 70px; background:linear-gradient(135deg,#c5a77e 0%,#a98960 100%); border:1px solid rgba(255,255,255,.45); border-radius:18px; padding:40px 7%; box-sizing:border-box; box-shadow:0 16px 38px rgba(75,55,32,.13);">
        <h2 id="kontak" style="position:relative; text-align:center; color:#fff; font:700 29px 'Playfair Display',serif; letter-spacing:.3px; margin:0 0 28px;">Kotak Kirim Pesan</h2>

        <form id="messageForm" style="position:relative; max-width:620px; margin:0 auto; display:grid; gap:16px;">
            <input type="text" name="nama" placeholder="Nama" aria-label="Nama" required style="width:100%; box-sizing:border-box; border:1px solid rgba(255,255,255,.55); border-radius:9px; background:rgba(255,255,255,.92); color:#38332c; padding:15px 17px; font:500 13px 'DM Sans',sans-serif; outline:none;">

            <select name="kategori" aria-label="Kategori" required style="width:100%; box-sizing:border-box; border:1px solid rgba(255,255,255,.55); border-radius:9px; background:rgba(255,255,255,.92); color:#81796e; padding:15px 17px; font:500 13px 'DM Sans',sans-serif; outline:none; cursor:pointer;">
                <option value="" selected disabled>Kategori</option>
                <option>Facial Basic</option>
                <option>Facial Acne</option>
                <option>Hair Spa</option>
                <option>Manicure</option>
                <option>Body Massage</option>
                <option>Makeup Natural</option>
            </select>

            <textarea name="deskripsi" placeholder="Deskripsi" aria-label="Deskripsi" required style="width:100%; box-sizing:border-box; min-height:115px; resize:vertical; line-height:1.6; border:1px solid rgba(255,255,255,.55); border-radius:9px; background:rgba(255,255,255,.92); color:#38332c; padding:15px 17px; font:500 13px 'DM Sans',sans-serif; outline:none;"></textarea>

            <button type="submit" style="justify-self:end; min-width:125px; border:1px solid #fff; border-radius:8px; background:#29251f; color:#fff; padding:12px 27px; font:700 11px 'DM Sans',sans-serif; letter-spacing:.5px; text-transform:uppercase; cursor:pointer;">Kirim</button>
        </form>
    </section>

    <script> 
        // Mengirim isi formulir ke WhatsApp.
        document.getElementById("messageForm").addEventListener("submit", event => {
            event.preventDefault();

            const formData = new FormData(event.currentTarget);
            const message =
                `Nama: ${formData.get("nama")}\n` +
                `Kategori: ${formData.get("kategori")}\n` +
                `Deskripsi: ${formData.get("deskripsi")}\n` +
                `Jumlah layanan di keranjang: ${cart.length}`;

            const whatsappUrl = "https://wa.me/?text=" + encodeURIComponent(message);
            window.open(whatsappUrl, "_blank", "noopener");
        });
    
    </script>
@endsection