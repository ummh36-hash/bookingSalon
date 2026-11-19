@extends('layouts.customer')

@section('content')
<main class="container" id="pesanan" style="width:min(1120px,86%);margin:auto;min-height:590px;padding:62px 0 75px;">
 <h1 style="font:600 27px 'Playfair Display',serif;margin:0 0 22px;">PESANAN SAYA</h1>
 <div class="order-tabs" role="tablist" aria-label="Status pesanan" style="display:flex;gap:9px;margin-bottom:28px;flex-wrap:wrap;">
  <button class="order-tab" type="button" data-status="belum" style="border:1px solid #e0dbd2;background:#fff;color:#615c55;padding:8px 15px;border-radius:20px;font:700 10px 'DM Sans',sans-serif;cursor:pointer;transition:.2s;">BELUM BAYAR</button>
  <button class="order-tab" type="button" data-status="terjadwal" style="border:1px solid #e0dbd2;background:#fff;color:#615c55;padding:8px 15px;border-radius:20px;font:700 10px 'DM Sans',sans-serif;cursor:pointer;transition:.2s;">TERJADWAL</button>
  <button class="order-tab active" type="button" data-status="selesai" style="border:1px solid #25231f;background:#25231f;color:#fff;padding:8px 15px;border-radius:20px;font:700 10px 'DM Sans',sans-serif;cursor:pointer;transition:.2s;">SELESAI</button>
 </div>
 <section id="orderList" aria-live="polite" style="display:grid;gap:18px;">
  <article class="order-card" data-order-status="selesai" style="width:100%;min-height:142px;background:#fff;display:grid;grid-template-columns:150px minmax(0,1fr) auto;align-items:center;gap:25px;padding:20px 26px;border:1px solid #e9e4dc;border-radius:14px;box-shadow:0 5px 18px rgba(37,35,31,.045);transition:transform .2s,box-shadow .2s;">
   <img src="https://images.unsplash.com/photo-1519823551278-64ac92734fb1?auto=format&fit=crop&w=500&q=85" alt="Perawatan body massage" style="width:150px;height:100px;object-fit:cover;display:block;border-radius:10px;">
   <div style="display:grid;gap:8px;">
    <h2 style="font:700 12px 'DM Sans',sans-serif;text-transform:uppercase;letter-spacing:1px;color:#25231f;margin:0;">Body Massage</h2>
    <p style="font:700 16px 'DM Sans',sans-serif;color:#b99a68;margin:0;">Rp 150.000</p>
    <p style="font-size:11px;color:#77736d;line-height:1.5;margin:0;">DATE: 4 - 11 - 2027</p>
   </div>
   <a class="order-action" href="user-rating.html" style="display:inline-block;text-align:center;text-decoration:none;border:1px solid #b99a68;background:#b99a68;color:#fff;padding:12px 25px;min-width:112px;border-radius:7px;font:700 10px 'DM Sans',sans-serif;letter-spacing:.5px;cursor:pointer;transition:.2s;">Rate</a>
  </article>
 </section>
 <p id="emptyState" style="display:none;padding:35px;text-align:center;color:#77736d;font-size:12px;background:#fff;border:1px solid #e9e4dc;border-radius:12px;">Belum ada pesanan pada kategori ini.</p>
</main>

<script>
const tabs = document.querySelectorAll(".order-tab");
const cards = document.querySelectorAll(".order-card");
const emptyState = document.getElementById("emptyState");

function showOrders(status) {
  tabs.forEach(tab => {
    const active = tab.dataset.status === status;
    tab.classList.toggle("active", active);
    tab.style.background = active ? "#25231f" : "#fff";
    tab.style.color = active ? "#fff" : "#615c55";
    tab.style.borderColor = active ? "#25231f" : "#e0dbd2";
  });

  let visible = 0;
  cards.forEach(card => {
    const match = card.dataset.orderStatus === status;
    card.hidden = !match;
    if (match) visible++;

    const actionButton = card.querySelector(".order-action");
    if (actionButton) {
      if (status === "belum") {
        actionButton.textContent = "Pay Now";
        actionButton.href = "user-bayar.html";
        actionButton.style.display = "inline-block";
      } else if (status === "selesai") {
        actionButton.textContent = "Rate";
        actionButton.href = "user-rating.html";
        actionButton.style.display = "inline-block";
      } else {
        actionButton.style.display = "none";
      }
    }
  });
  emptyState.style.display = visible ? "none" : "block";
}
tabs.forEach(tab => tab.addEventListener("click", () => showOrders(tab.dataset.status)));
showOrders("terjadwal");

/* Penyesuaian responsif tanpa media query */
function responsiveLayout() {
  const mobile = window.innerWidth <= 760;
  const small = window.innerWidth <= 430;
  document.querySelector("header").style.height = mobile ? "auto" : "76px";
  document.querySelector("header").style.padding = mobile ? "13px 0" : "0";
  document.querySelector(".container").style.width = mobile ? "92%" : "min(1120px,86%)";
  document.querySelector(".nav").style.flexWrap = mobile ? "wrap" : "nowrap";
  document.querySelector(".nav-links").style.order = mobile ? "3" : "0";
  document.querySelector(".nav-links").style.width = mobile ? "100%" : "auto";
  document.querySelector(".nav-links").style.justifyContent = mobile ? "center" : "initial";
  document.querySelector(".nav-links").style.gap = small ? "10px" : mobile ? "16px" : "25px";
  document.querySelector("main").style.minHeight = mobile ? "520px" : "590px";
  document.querySelector("main").style.padding = mobile ? "42px 0 60px" : "62px 0 75px";
  document.querySelector(".order-card").style.gridTemplateColumns = mobile ? (small ? "90px 1fr" : "110px 1fr") : "150px minmax(0,1fr) auto";
  document.querySelector(".order-card").style.gap = mobile ? (small ? "12px" : "14px") : "25px";
  document.querySelector(".order-card").style.padding = mobile ? (small ? "12px" : "14px") : "20px 26px";
  const img = document.querySelector(".order-card img");
  img.style.width = mobile ? (small ? "90px" : "110px") : "150px";
  img.style.height = mobile ? (small ? "72px" : "75px") : "100px";
  const action = document.querySelector(".order-action");
  if (mobile) {
    action.style.gridColumn = "2";
    action.style.justifySelf = "start";
    action.style.padding = "9px 22px";
  } else {
    action.style.gridColumn = "auto";
    action.style.justifySelf = "auto";
    action.style.padding = "12px 25px";
  }
  document.querySelector(".footer-grid").style.gridTemplateColumns = mobile ? "1fr 1fr" : "1.2fr .8fr 1fr";
  document.querySelector(".footer-grid").style.gap = mobile ? "28px" : "45px";
  document.querySelector(".footer-grid").firstElementChild.style.gridColumn = mobile ? "1 / -1" : "auto";
  document.querySelector(".copyright").style.flexDirection = small ? "column" : "row";
  document.querySelector(".page-heading").style.fontSize = small ? "24px" : "27px";
  if (small) {
    document.querySelectorAll(".nav-links a").forEach(a => a.style.fontSize = "9px");
    document.querySelector(".order-details h2").style.fontSize = "10px";
    document.querySelectorAll(".order-details p").forEach(p => p.style.fontSize = p.textContent.startsWith("Rp") ? "16px" : "9px");
    action.style.fontSize = "9px";
  } else {
    document.querySelectorAll(".nav-links a").forEach(a => a.style.fontSize = "12px");
    document.querySelector(".order-details h2").style.fontSize = "12px";
    document.querySelectorAll(".order-details p").forEach(p => p.style.fontSize = p.textContent.startsWith("Rp") ? "16px" : "11px");
    action.style.fontSize = "10px";
  }
}
window.addEventListener("resize", responsiveLayout);
responsiveLayout();
</script>

@endsection