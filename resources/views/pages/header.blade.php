<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Barlow:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}" />

  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggle-search");
    const searchBox = document.getElementById("search-box");
    const searchLogo = document.getElementById("search-logo");
    const searchInput = document.querySelector('input[name="query"]');

    toggleBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      searchBox.classList.toggle("show");
      searchLogo.classList.toggle("move");
      if (searchBox.classList.contains("show")) {
        searchInput.focus();
      }
    });

    document.addEventListener("click", function (e) {
      if (!searchBox.contains(e.target) && !toggleBtn.contains(e.target)) {
        searchBox.classList.remove("show");
        searchLogo.classList.remove("move");
        const oldDropdown = document.getElementById("search-suggestions-dropdown");
        if (oldDropdown) oldDropdown.remove();
      }
    });

    searchInput.addEventListener("input", function () {
  const keyword = this.value;

  // Remove all previous dropdowns inside searchBox
  const oldDropdowns = searchBox.querySelectorAll(".dropdown");
  oldDropdowns.forEach(d => d.remove());

  if (keyword.length === 0) return;

  fetch(`/search-suggestions?query=${encodeURIComponent(keyword)}`)
    .then(response => response.json())
    .then(data => {
      dropdown = document.createElement('div');
      dropdown.classList.add('dropdown');
      dropdown.style.position = 'absolute';
      dropdown.style.left = '0';
      dropdown.style.top = '100%';
      dropdown.style.backgroundColor = '#fff';
      dropdown.style.border = '1px solid #1F27A6';
      dropdown.style.width = '100%';
      dropdown.style.zIndex = 999;
      dropdown.style.padding = '8px';
      dropdown.style.marginTop = '5px';
      dropdown.style.borderRadius = '4px';
      dropdown.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
      dropdown.style.textAlign = 'left';

      let count = 0;
      data.sort((a, b) => a.name.localeCompare(b.name));
      data.forEach(product => {
        if (count < 5) {
          const item = document.createElement('a');
          item.href = `/product/${product.name}`;
          item.style.display = 'flex';
          item.style.alignItems = 'center';
          item.style.gap = '8px';
          item.style.padding = '4px 0';
          item.style.textDecoration = 'none';

          const img = document.createElement('img');
          img.src = `/storage/${product.image_URL}`;
          img.style.width = '30px';
          img.style.height = '30px';
          img.style.objectFit = 'cover';
          img.style.borderRadius = '4px';

          const text = document.createElement('span');
          text.textContent = product.name;
          text.style.color = '#1F27A6';
          text.style.fontSize = '14px';

          item.appendChild(img);
          item.appendChild(text);
          dropdown.appendChild(item);
          count++;
        }
      });

      if (data.length > 5) {
        const more = document.createElement('div');
        more.textContent = 'See more...';
        more.style.color = '#E55182';
        more.style.marginTop = '6px';
        more.style.fontSize = '14px';
        more.style.cursor = 'pointer';
        dropdown.appendChild(more);
      }

      searchBox.appendChild(dropdown);
    });
});
  });
</script>
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  <header>
    <nav class="flex justify-between items-center p-10 bg-pink-100 text-[#1F27A6] shadow-md fixed top-0 left-0 w-full z-10 font-poppins font-medium">
      <button id="open-menu" class="flex flex-col gap-1.5 bg-none border-0 cursor-pointer absolute left-8 sm:left-[50px] top-1/2 -translate-y-1/2 z-50" aria-label="Toggle menu">
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
      </button>

      <div class="absolute left-1/2 transform -translate-x-1/2 z-20">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[180px] h-[70px] sm:w-[200px] sm:h-[80px] md:w-[270px] md:h-[100px] hover:underline transition-all duration-300" />
        </a>
      </div>

      <div class="hidden md:flex items-center gap-6 pr-20 ml-auto relative">
        <button id="toggle-search" class="focus:outline-none relative z-50">
          <img id="search-logo" src="{{ asset('images/search_logo.png') }}" alt="Search" class="w-7 h-auto">
        </button>

        <form id="search-box" action="{{ route('home') }}" method="GET" class="relative search-box-slide bg-white border border-[#1F27A6] rounded-md px-3 py-1 shadow-md z-40">
          <input 
            type="text" 
            name="query" 
            placeholder="Search..." 
            class="text-sm text-[#1F27A6] focus:outline-none bg-transparent w-48"
          />
        </form>

        <a href="{{ Auth::check() ? route(auth()->user()->role . '.dashboard') : route('register') }}">
          <img src="{{ asset('images/profile_logo.png') }}" alt="Account" class="w-7 h-auto">
        </a>

        <a href="{{ auth()->check() ? route('cart') : route('cart.not_logged_in') }}">
          <img src="{{ asset('images/cart_logo.png') }}" alt="Cart" class="w-7 h-auto">
        </a>
      </div>

      <div id="overlay" class="fixed inset-0 z-30 hidden"></div>
      <div id="mobile-slide-menu" class="fixed top-0 left-0 h-full bg-pink-100 text-white transform -translate-x-full transition-transform duration-300 z-40 flex flex-col w-full md:w-1/4 z-50">
        <div class="flex justify-between items-center p-6">
          <a href="{{ route('home') }}">
            <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-40 h-auto">
          </a>
          <button id="close-menu" class="text-[#1F27A6] text-3xl font-bold">&times;</button>
        </div>

        <nav class="flex flex-col gap-6 px-12 text-xl mt-6 text-left">
          <a href="{{ route('shop') }}" class="hover:underline text-[#1F27A6]">Shop</a>
          <a href="{{ route('about') }}" class="hover:underline text-[#1F27A6]">About</a>
          <a href="{{ route('contact') }}" class="hover:underline text-[#1F27A6]">Contact</a>
          <a href="{{ Auth::check() ? route('dashboard') : route('register') }}" target="_blank" class="hover:underline text-[#1F27A6]">Account</a>
        </nav>

        <div class="flex-grow"></div>

        <div class="px-6 pb-8 flex flex-col items-start gap-4">
          <div class="flex gap-4 mt-2 px-6">
            <a href="#" target="_blank"><img src="{{ asset('images/facebok.png') }}" alt="Facebook" class="h-6 w-6"></a>
            <a href="#" target="_blank"><img src="{{ asset('images/twitter.png') }}" alt="Twitter" class="h-6 w-6"></a>
            <a href="#" target="_blank"><img src="{{ asset('images/insta.png') }}" alt="Instagram" class="h-6 w-6"></a>
            <a href="#" target="_blank"><img src="{{ asset('images/yt.png') }}" alt="YouTube" class="h-6 w-6"></a>
          </div>
        </div>
      </div>
    </nav>
  </header>
</body>
</html>
