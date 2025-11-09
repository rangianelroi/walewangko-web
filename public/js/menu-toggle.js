// Logika untuk toggle menu hamburger (dengan animasi slide)
document.getElementById('menu-toggle').addEventListener('click', function() {
  var menu = document.getElementById('mobile-menu');
  var isExpanded = this.getAttribute('aria-expanded') === 'true';
  
  this.setAttribute('aria-expanded', !isExpanded);
  
  if (menu.style.maxHeight) {
    // Menu sedang terbuka, tutup
    menu.style.maxHeight = null;
  } else {
    // Menu sedang tertutup, buka
    // Gunakan scrollHeight untuk mendapatkan tinggi konten yang sebenarnya
    menu.style.maxHeight = menu.scrollHeight + "px";
  }
});