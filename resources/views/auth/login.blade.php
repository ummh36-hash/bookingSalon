<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Studio Flawless</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #f1eee8;
    --card: #ffffff;
    --ink: #24211e;
    --muted: #8a837a;
    --line: #e7e2d9;
    --field: #f5f3ee;
    --accent: #6b4f35;
    --accent-soft: #efe8de;
    --btn: #2a2724;
    --radius: 14px;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  html, body { height: 100%; }
  body {
    font-family: 'Jost', system-ui, -apple-system, 'Segoe UI', sans-serif;
    color: var(--ink);
    background:
      radial-gradient(900px 500px at 15% 0%, #f9f6f0 0%, transparent 60%),
      radial-gradient(700px 500px at 100% 100%, #e9e3d8 0%, transparent 60%),
      var(--bg);
    display: grid;
    place-items: center;
    padding: 24px 16px;
    -webkit-font-smoothing: antialiased;
  }

  .card {
    position: relative;
    width: 100%;
    max-width: 448px;
    background: var(--card);
    border-radius: 24px;
    padding: 28px 40px 32px;
    box-shadow:
      0 1px 2px rgba(60, 45, 30, .04),
      0 12px 32px -8px rgba(60, 45, 30, .10),
      0 40px 80px -24px rgba(60, 45, 30, .14);
    animation: rise .7s cubic-bezier(.2, .8, .2, 1) both;
  }
  @keyframes rise { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: none; } }

  /* Back pill */
  .back {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 11px; font-weight: 500; letter-spacing: .02em;
    color: var(--accent);
    background: var(--accent-soft);
    padding: 7px 13px; border-radius: 999px;
    text-decoration: none;
    transition: background .2s, transform .2s;
  }
  .back:hover { background: #e6dccd; transform: translateX(-2px); }
  .back svg { width: 12px; height: 12px; }

  /* Brand */
  .brand { text-align: center; margin-top: 14px; }
  .logo {
    width: 76px; height: 76px; margin: 0 auto 14px;
    border-radius: 50%;
    background: linear-gradient(145deg, #f6f1e9, #ebe4d8);
    box-shadow: inset 0 0 0 1px rgba(107, 79, 53, .12), 0 8px 18px -8px rgba(107, 79, 53, .35);
    display: flex; flex-direction: column; align-items: center; justify-content: center;
  }
  .logo b {
    font-family: 'Cormorant Garamond', Georgia, serif;
    font-weight: 600; font-size: 29px; line-height: 1;
    color: var(--accent); letter-spacing: .02em;
  }
  .logo small {
    font-size: 4.5px; letter-spacing: .22em; text-transform: uppercase;
    color: var(--accent); opacity: .75; margin-top: 3px;
  }
  .brand h1 {
    font-size: 11px; font-weight: 500; letter-spacing: .38em;
    color: var(--accent); padding-left: .38em;
  }

  .lead {
    text-align: center; font-size: 13.5px; line-height: 1.6;
    color: #5b554e; margin: 22px auto 26px; max-width: 290px;
  }

  /* Fields */
  .field { margin-bottom: 16px; }
  .row { display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 8px; }
  label {
    font-size: 10.5px; font-weight: 600; letter-spacing: .16em;
    color: var(--ink);
  }
  .forgot {
    font-size: 11.5px; color: var(--muted); text-decoration: none;
    transition: color .2s;
  }
  .forgot:hover { color: var(--accent); }

  .input {
    position: relative; display: flex; align-items: center;
    background: var(--field);
    border: 1px solid transparent;
    border-radius: var(--radius);
    transition: border-color .2s, background .2s, box-shadow .2s;
  }
  .input:focus-within {
    background: #fff;
    border-color: var(--accent);
    box-shadow: 0 0 0 4px rgba(107, 79, 53, .10);
  }
  .input input {
    flex: 1; min-width: 0; border: 0; background: transparent; outline: 0;
    font: inherit; font-size: 14px; color: var(--ink);
    padding: 15px 0 15px 16px;
  }
  .input input::placeholder { color: #aaa399; }
  .input .ico {
    width: 44px; height: 44px; display: grid; place-items: center;
    color: var(--muted); background: none; border: 0; cursor: default;
  }
  .input button.ico { cursor: pointer; border-radius: var(--radius); transition: color .2s; }
  .input button.ico:hover { color: var(--accent); }
  .ico svg { width: 17px; height: 17px; }

  /* Options */
  .options {
    display: flex; justify-content: space-between; align-items: center;
    margin: 18px 0 22px;
  }
  .check { display: inline-flex; align-items: center; gap: 9px; cursor: pointer; font-size: 12.5px; font-weight: 400; letter-spacing: 0; color: #5b554e; user-select: none; }
  .check input { position: absolute; opacity: 0; pointer-events: none; }
  .box {
    width: 17px; height: 17px; border-radius: 5px;
    background: var(--accent); display: grid; place-items: center;
    transition: background .2s, box-shadow .2s;
    box-shadow: 0 0 0 1px var(--accent);
  }
  .box svg { width: 11px; height: 11px; stroke: #fff; opacity: 1; transition: opacity .15s; }
  .check input:not(:checked) + .box { background: #fff; box-shadow: 0 0 0 1.5px #cfc8bc; }
  .check input:not(:checked) + .box svg { opacity: 0; }
  .check input:focus-visible + .box { box-shadow: 0 0 0 4px rgba(107, 79, 53, .2), 0 0 0 1px var(--accent); }

  .ssl { display: inline-flex; align-items: center; gap: 6px; font-size: 11.5px; color: var(--muted); }
  .ssl svg { width: 13px; height: 13px; color: #5f8a63; }

  /* Buttons */
  .btn-main {
    width: 100%; display: flex; align-items: center; justify-content: center; gap: 10px;
    padding: 16px; border: 0; border-radius: var(--radius); cursor: pointer;
    background: linear-gradient(180deg, #34312d, var(--btn));
    color: #fff; font: inherit; font-size: 12px; font-weight: 600; letter-spacing: .28em;
    box-shadow: 0 10px 22px -10px rgba(42, 39, 36, .6), inset 0 1px 0 rgba(255, 255, 255, .08);
    transition: transform .2s, box-shadow .2s;
  }
  .btn-main svg { width: 15px; height: 15px; transition: transform .25s; }
  .btn-main:hover { transform: translateY(-1px); box-shadow: 0 14px 26px -10px rgba(42, 39, 36, .7), inset 0 1px 0 rgba(255, 255, 255, .08); }
  .btn-main:hover svg { transform: translateX(4px); }
  .btn-main:active { transform: translateY(0); }

  .divider {
    display: flex; align-items: center; gap: 14px; margin: 22px 0;
    font-size: 10px; letter-spacing: .24em; color: var(--muted);
  }
  .divider::before, .divider::after { content: ""; flex: 1; height: 1px; background: var(--line); }

  .btn-google {
    display: flex; align-items: center; justify-content: center; gap: 10px;
    width: 100%; padding: 13px; border-radius: var(--radius);
    background: #fff; border: 1px solid var(--line); cursor: pointer;
    font: inherit; font-size: 13px; font-weight: 500; color: var(--ink);
    transition: background .2s, border-color .2s, transform .2s;
  }
  .btn-google:hover { background: var(--field); border-color: #d8d1c4; transform: translateY(-1px); }
  .btn-google svg { width: 17px; height: 17px; }

  .signup { text-align: center; font-size: 12.5px; color: var(--muted); margin-top: 26px; }
  .signup a {
    color: var(--accent); font-weight: 600; text-decoration: none;
    border-bottom: 1px solid rgba(107, 79, 53, .3); padding-bottom: 1px;
    transition: border-color .2s;
  }
  .signup a:hover { border-color: var(--accent); }

  @media (max-width: 480px) {
    .card { padding: 24px 24px 28px; border-radius: 20px; }
  }
  @media (prefers-reduced-motion: reduce) { * { animation: none !important; transition: none !important; } }
</style>
</head>
<body>

<main class="card">
  <a href="/" class="back">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
    Kembali ke Beranda
  </a>

  <header class="brand">
    <div class="logo"><b>SF</b><small>Studio Flawless</small></div>
    <h1>STUDIO FLAWLESS</h1>
  </header>

  <p class="lead">Silakan masukkan email Anda untuk melanjutkan</p>

  <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
    @csrf
    <div class="field">
      <div class="row"><label for="email">EMAIL</label></div>
      <div class="input">
        <input name="email" id="email" type="text" placeholder="nama@email.com" autocomplete="username">
        <span class="ico" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-7 8-7s8 3 8 7"/></svg>
        </span>
      </div>
    </div>

    <div class="field">
      <div class="row">
        <label for="password">KATA SANDI</label>
        <a href="#" class="forgot"></a>
      </div>
      <div class="input">
        <input name="password" id="password" type="password" placeholder="••••••••••••" autocomplete="current-password">
        <button type="button" class="ico" id="toggle" aria-label="Tampilkan kata sandi">
          <svg id="eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
        </button>
      </div>
    </div>

    <div class="options">
      <label class="check">
        <input type="checkbox" checked>
        <span class="box"><svg viewBox="0 0 24 24" fill="none" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg></span>
        Ingat saya
      </label>
      <span class="ssl">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="11" width="16" height="10" rx="2"/><path d="M8 11V7a4 4 0 018 0v4"/></svg>
        SSL Aman
      </span>
    </div>

    <button type="submit" class="btn-main">
      MASUK
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </button>
  </form>

 

  <p class="signup">Belum memiliki akun? <a href="{{ route('register') }}">Daftar Akun Baru</a></p>
</main>

<script>
  const pw = document.getElementById('password');
  const eye = document.getElementById('eye');
  const toggle = document.getElementById('toggle');
  const open = '<path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/>';
  const closed = '<path d="M17.9 17.9A10 10 0 0112 19C5.6 19 2 12 2 12a18 18 0 015.1-5.9M9.9 5.2A9 9 0 0112 5c6.4 0 10 7 10 7a18 18 0 01-2.2 3.2M1 1l22 22"/><path d="M14.1 14.1a3 3 0 01-4.2-4.2"/>';
  toggle.addEventListener('click', () => {
    const show = pw.type === 'password';
    pw.type = show ? 'text' : 'password';
    eye.innerHTML = show ? closed : open;
    toggle.setAttribute('aria-label', show ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
  });
//   document.getElementById('loginForm').addEventListener('submit', e => e.preventDefault());
</script>
</body>
</html>
