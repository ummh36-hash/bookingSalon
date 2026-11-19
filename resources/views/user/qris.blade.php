<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Studio Flawless - Pembayaran QRIS</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
<style>
:root{--cream:#f5f2ec;--white:#fff;--ink:#25231f;--muted:#77736d;--gold:#b99a68;--line:#e9e4dc;--gold-light:#faf6f0;--success-bg:#e6f4ea;--success-text:#137333}
*{box-sizing:border-box;margin:0;padding:0}
body{background:var(--cream);color:var(--ink);font-family:"DM Sans",sans-serif;min-height:100vh;display:flex;justify-content:center;align-items:center;padding:20px}

/* Modal Pembayaran QRIS */
.qris-modal {
  background: var(--white);
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(40,30,20,.08);
  width: 100%;
  max-width: 480px;
  padding: 24px;
  position: relative;
}
.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
  border-bottom: 1px solid var(--line);
  padding-bottom: 15px;
}
.modal-title { font: 600 20px "Playfair Display",serif; }
.close-btn { background: none; border: none; font-size: 22px; cursor: pointer; color: var(--muted); text-decoration: none; line-height: 1; }

.section-label { 
  font-size: 10px; 
  color: var(--muted); 
  text-transform: uppercase; 
  letter-spacing: 1px; 
  margin-bottom: 10px; 
  font-weight: 600;
}

/* Area QR Code */
.qr-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 16px;
  background: #faf8f5;
  border: 1px solid var(--line);
  border-radius: 10px;
  margin-bottom: 16px;
}
.qr-code-img {
  width: 180px;
  height: 180px;
  object-fit: contain;
  border-radius: 6px;
  background: #fff;
  padding: 8px;
  border: 1px solid var(--line);
}
.qr-hint {
  font-size: 11px;
  color: var(--muted);
  margin-top: 10px;
  text-align: center;
}

/* Notifikasi Status (Awalnya tersembunyi / hidden) */
.status-alert {
  display: none;
  background: var(--gold-light);
  border: 1px dashed var(--gold);
  border-radius: 8px;
  padding: 12px 14px;
  font-size: 11px;
  color: var(--ink);
  text-align: center;
  line-height: 1.5;
  margin-bottom: 20px;
}
.status-alert.show {
  display: block;
}
.status-alert span {
  font-weight: 700;
  color: var(--gold);
}

/* Form Upload Bukti */
.upload-section { margin-bottom: 20px; }
.dropzone {
  border: 2px dashed var(--line);
  border-radius: 8px;
  padding: 24px 16px;
  text-align: center;
  background: #faf8f5;
  cursor: pointer;
  transition: all 0.2s;
  position: relative;
}
.dropzone:hover {
  border-color: var(--gold);
  background: var(--gold-light);
}
.dropzone-icon {
  width: 48px;
  height: 48px;
  margin-bottom: 8px;
  opacity: 0.8;
}
.dropzone-text {
  font-size: 12px;
  color: var(--muted);
}
.dropzone-text label {
  color: var(--gold);
  font-weight: 600;
  cursor: pointer;
  text-decoration: underline;
}
.file-input { display: none; }

/* File Preview / Selection Display */
.file-preview {
  display: none;
  font-size: 11px;
  color: var(--ink);
  font-weight: 600;
  margin-top: 6px;
  background: #fff;
  padding: 6px 10px;
  border-radius: 4px;
  border: 1px solid var(--line);
}

/* Pesan Error Validasi Kustom (Tanpa alert bawaan browser) */
.error-msg {
  display: none;
  color: #d93025;
  font-size: 11px;
  margin-bottom: 10px;
  text-align: center;
  font-weight: 600;
}
.error-msg.show { display: block; }

/* Tombol Submit */
.submit-btn {
  width: 100%;
  background: var(--gold);
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 14px;
  font: 700 12px "DM Sans",sans-serif;
  cursor: pointer;
  text-align: center;
  letter-spacing: 0.5px;
  transition: background 0.2s;
}
.submit-btn:hover { background: #a98855; }
</style>
</head>
<body>

<div class="qris-modal">
  <!-- Modal Header -->
  <div class="modal-header">
    <h2 class="modal-title">Pembayaran QRIS</h2>
    <a href="{{ route('user.keranjang') }}" class="close-btn">&times;</a>
  </div>

  <!-- QR Code Display -->
  <div class="qr-container">
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=StudioFlawlessQRIS" alt="QRIS Code" class="qr-code-img">
    <p class="qr-hint">Scan QR di atas menggunakan GoPay, OVO, Dana, ShopeePay, atau Mobile Banking Anda.</p>
  </div>

  <!-- Status Alert (Muncul setelah tombol kirim ditekan) -->
  <div class="status-alert" id="statusAlert">
    Status pembayaran <span>sudah dikirim</span>! Menunggu persetujuan (acc) dari admin.
  </div>

  <!-- Pesan Peringatan jika file belum dipilih -->
  <div class="error-msg" id="errorMsg">Silakan upload bukti pembayaran terlebih dahulu!</div>

  <!-- Upload Bukti Pembayaran -->
  <div class="upload-section" id="uploadSection">
    <div class="section-label">Upload Bukti Pembayaran</div>
    <div class="dropzone" id="dropzone">
      <svg class="dropzone-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
      </svg>
      <p class="dropzone-text">
        Drag and drop files here<br>
        or <label for="fileUpload">select a file</label> from your computer
      </p>
      <input type="file" id="fileUpload" class="file-input" accept="image/*">
      <div id="filePreview" class="file-preview"></div>
    </div>
  </div>

  <!-- Submit Button -->
  <button type="button" class="submit-btn" id="submitBtn">Submit Bukti Pembayaran</button>
</div>

<script>
const fileInput = document.getElementById('fileUpload');
const filePreview = document.getElementById('filePreview');
const dropzone = document.getElementById('dropzone');
const statusAlert = document.getElementById('statusAlert');
const errorMsg = document.getElementById('errorMsg');
const uploadSection = document.getElementById('uploadSection');
const submitBtn = document.getElementById('submitBtn');

// Tampilkan nama file yang dipilih
fileInput.addEventListener('change', (e) => {
  if (fileInput.files.length > 0) {
    filePreview.textContent = `File terpilih: ${fileInput.files[0].name}`;
    filePreview.style.display = 'inline-block';
    errorMsg.classList.remove('show');
  }
});

// Drag & Drop Handling
dropzone.addEventListener('dragover', (e) => {
  e.preventDefault();
  dropzone.style.borderColor = 'var(--gold)';
});

dropzone.addEventListener('dragleave', () => {
  dropzone.style.borderColor = 'var(--line)';
});

dropzone.addEventListener('drop', (e) => {
  e.preventDefault();
  dropzone.style.borderColor = 'var(--line)';
  if (e.dataTransfer.files.length > 0) {
    fileInput.files = e.dataTransfer.files;
    filePreview.textContent = `File terpilih: ${e.dataTransfer.files[0].name}`;
    filePreview.style.display = 'inline-block';
    errorMsg.classList.remove('show');
  }
});

// Klik Submit (Tanpa Pop-up "This page says")
submitBtn.addEventListener('click', () => {
  if (!fileInput.files.length) {
    errorMsg.classList.add('show');
    return;
  }

  // Sembunyikan pesan error jika ada
  errorMsg.classList.remove('show');

  // Sembunyikan bagian upload dan tampilkan status sukses di dalam page
  uploadSection.style.display = 'none';
  statusAlert.classList.add('show');
  
  // Ubah tombol menjadi tombol kembali/selesai
  submitBtn.textContent = 'Kembali ke Beranda';
  submitBtn.onclick = function() {
    window.location.href = '{{route("user.pesanan")}}'; // Ganti dengan route ke halaman beranda user
  };
});
</script>
</body>
</html>