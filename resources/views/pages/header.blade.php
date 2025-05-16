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

    function debounce(func, delay = 300) {
      let timer;
      return function (...args) {
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(this, args), delay);
      };
    }

    const showSuggestions = debounce(function () {
      const keyword = searchInput.value.trim().toLowerCase();

      const oldDropdown = document.querySelector(".dropdown");
      if (oldDropdown) oldDropdown.remove();

      if (keyword.length === 0) return;

      fetch(`/search-suggestions?query=${encodeURIComponent(keyword)}`)
        .then(res => res.json())
        .then(data => {
          data.sort((a, b) => {
            const nameA = a.name.toLowerCase();
            const nameB = b.name.toLowerCase();
            
            const startsWithA = nameA.startsWith(keyword) ? -1 : 1;
            const startsWithB = nameB.startsWith(keyword) ? -1 : 1;

            if (nameA.startsWith(keyword) && nameB.startsWith(keyword)) {
              return nameA.localeCompare(nameB);
            }

            return startsWithA - startsWithB;
          });

          const dropdown = document.createElement("div");
          dropdown.classList.add("dropdown");
          Object.assign(dropdown.style, {
            position: "absolute",
            left: "0",
            top: "100%",
            backgroundColor: "#fff",
            border: "1px solid #1F27A6",
            width: "100%",
            zIndex: 999,
            padding: "8px",
            marginTop: "5px",
            borderRadius: "4px",
            boxShadow: "0 2px 4px rgba(0,0,0,0.1)",
            textAlign: "left",
          });

          let count = 0;
          for (const product of data) {
            if (count >= 5) break;

            const productUrl = `/product/${product.product_ID}`;

            const item = document.createElement("a");
            item.href = productUrl;
            Object.assign(item.style, {
                display: "flex",
                alignItems: "center",
                gap: "8px",
                padding: "4px 0",
                textDecoration: "none",
            });

            const img = document.createElement("img");
            img.src = `${product.image_URL}`;
            Object.assign(img.style, {
              width: "30px",
              height: "30px",
              objectFit: "cover",
              borderRadius: "4px",
            });

            const text = document.createElement("span");
            text.textContent = product.name;
            Object.assign(text.style, {
              color: "#1F27A6",
              fontSize: "14px",
            });

            item.appendChild(img);
            item.appendChild(text);
            dropdown.appendChild(item);
            count++;
          }

          if (data.length > 5) {
            const more = document.createElement("div");
            more.textContent = "";
            Object.assign(more.style, {
              color: "#E55182",
              marginTop: "6px",
              fontSize: "14px",
              cursor: "pointer",
            });
            dropdown.appendChild(more);
          }

          searchBox.appendChild(dropdown);
        });
    }, 300);

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
        const dropdown = document.querySelector(".dropdown");
        if (dropdown) dropdown.remove();
      }
    });

    searchInput.addEventListener("input", showSuggestions);

    const overlay = document.getElementById('overlay');
    const menu = document.getElementById('mobile-slide-menu');
    const openMenuBtn = document.getElementById('open-menu'); 
    const closeMenuBtn = document.getElementById('close-menu');

    openMenuBtn.addEventListener('click', () => {
      menu.classList.remove('-translate-x-full');
      overlay.classList.remove('opacity-0', 'pointer-events-none');
    });

    closeMenuBtn.addEventListener('click', () => {
      menu.classList.add('-translate-x-full');
      overlay.classList.add('opacity-0', 'pointer-events-none');
    });
    });
</script>

</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col ">
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

      <div id="overlay" class="fixed inset-0 bg-[rgba(0,0,0,0.3)] flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300"></div>
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
