<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sabrosa</title>
  @vite(['resources/css/app.css', 'resources/css/app.css', 'resources/js/app.js']) 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Barlow:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden">

  <!-- Navbar -->
  <header>
    <nav class="flex justify-between items-center p-10 bg-pink-100 text-[#1F27A6] shadow-md fixed top-0 left-0 w-full z-10 font-poppins font-medium">
      <!-- Left: Menu -->
      <button class="flex flex-col gap-1.5 bg-none border-0 cursor-pointer absolute left-5 top-5 md:hidden" aria-label="Toggle menu">
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
      </button>

      <!-- Center: Logo -->
      <div class="absolute left-1/2 transform -translate-x-1/2">
        <a href="index.html">
          <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[270px] h-[100px] hover:underline">
        </a>
      </div>

      <!-- Nav Links -->
      <ul class="hidden md:flex gap-12 pl-20">
        <li><a href="about.html" class="hover:underline text-lg">Shop</a></li>
        <li><a href="contact.html" class="hover:underline text-lg">About</a></li>
        <li><a href="contact.html" class="hover:underline text-lg">Contact</a></li>
      </ul>

      <!-- Social Icons -->
      <div class="hidden md:flex gap-6 pr-20 ml-auto">
        <a href="https://www.facebook.com/austin.datan/" target="_blank"><img src="{{ asset('images/fb_logo.png') }}" alt="Facebook" class="w-6 h-6 invert"></a>
        <a href="https://www.instagram.com/dilan_06p5/" target="_blank"><img src="{{ asset('images/instagram_logo.png') }}" alt="Instagram" class="w-6 h-6 invert"></a>
        <a href="https://www.linkedin.com/in/austindatan/" target="_blank"><img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" class="w-6 h-6"></a>
      </div>
    </nav>
  </header>

  <div class="flex flex-col lg:flex-row gap-10 px-10 py-10 max-w-[1440px] mx-auto mt-[100px]">
    <div class="flex-1 flex flex-col gap-4">
        <img src="{{ asset('images/product/product display/straw.png') }}" alt="Strawberry Bar" className="h-[450px] object-contain">
    </div>

    <!-- Right: Product Info -->
    <div class="flex-1 flex flex-col gap-2">
      <div class="flex items-center justify-start gap-2 border-2 border-pink-300 rounded-full px-4 py-1 w-fit bg-white">
        <span class="text-pink-500 text-xl">★★★★★</span>
        <span class="text-gray-700 font-semibold">(778)</span>
      </div>

      <div class="flex justify-between items-stretch w-full mt-4 gap-4">
        <div class="flex-1">
          <h2 class="text-4xl font-bold text-gray-900 leading-tight h-full flex text-left font-dm-sans">
            Strawberry Shortcake<br>Strawberry Bar
          </h2>
        </div>

        <div class="bg-pink-400 text-white text-2xl px-6 py-4 rounded-2xl flex items-center justify-center font-barlow">
          P115
        </div>
      </div>

      <div class="flex items-stretch gap-4 mt-6">
        <div class="w-40 flex items-center border-2 border-pink-300 rounded-xl overflow-hidden text-lg font-semibold bg-white">
          <button class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">−</button>
          <span class="w-1/3 text-center py-2">1</span>
          <button class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">+</button>
        </div>

        <button class="flex-1 bg-pink-400 text-white text-lg font-semibold px-8 py-3 rounded-xl hover:bg-pink-500 transition">
          Add to Shopping Cart
        </button>

      </div>


      <div>
        <h3 class="text-lg font-semibold mt-4 mb-2">Description</h3>
        <p class="text-gray-700 leading-relaxed">
          Compartés Strawberry Shortcake white chocolate bar, is packed full of strawberries and chunks of airy homemade shortcake. It's a chocolate bar that tastes like absolute heaven in every bite! Wrapped up in Compartés hand-drawn strawberry graphics. Handmade in our Los Angeles chocolate kitchens.
        </p>
      </div>

      <!-- Ingredients -->
      <div>
        <h3 class="text-lg font-semibold mt-4 mb-2">Ingredients</h3>
        <p class="text-gray-700 text-sm">
          White Chocolate (Sugar, Cocoa Butter, Whole Milk, Soy Lecithin as an Emulsifier, Vanilla), Strawberries, Shortcake (Wheat Flour, Butter, Sugar, Wheat Starch, Salt)
        </p>
      </div>
    </div>
  </div>

  <!-- Related Products -->
  <div class="px-10 pb-10 max-w-[1440px] mx-auto">
    <h3 class="text-2xl font-semibold mb-4">Pairs Well With</h3>
    <div class="flex gap-6 overflow-x-auto">
      <div class="bg-white p-4 rounded-lg shadow-md w-[180px] flex flex-col items-center">
        <img src="https://via.placeholder.com/100" class="mb-2">
        <p class="text-sm text-center mb-1">Strawberry Shortcake Donut Bites</p>
        <span class="bg-[#FF6C9B] text-white px-3 py-1 rounded-md font-semibold">P475</span>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-md w-[180px] flex flex-col items-center">
        <img src="https://via.placeholder.com/100" class="mb-2">
        <p class="text-sm text-center mb-1">Cherry Vanilla Soda</p>
        <span class="bg-[#FF6C9B] text-white px-3 py-1 rounded-md font-semibold">P85</span>
      </div>
    </div>
  </div>


  </div>
  <footer class="bg-cover bg-center" style="background-image: url('{{ asset('images/footer.png') }}');">
    <div class="flex justify-between items-center px-8 py-6">
      <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-auto h-12">
      <ul class="flex gap-4">
        <li><a href="#"><img src="{{ asset('images/facebok.png') }}" alt="Facebook Logo" class="w-8 h-auto"></a></li>
        <li><a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Twitter Logo" class="w-8 h-auto"></a></li>
        <li><a href="#"><img src="{{ asset('images/insta.png') }}" alt="Instagram Logo" class="w-8 h-auto"></a></li>
        <li><a href="#"><img src="{{ asset('images/yt.png') }}" alt="YouTube Logo" class="w-8 h-auto"></a></li>
      </ul>
    </div>
  </footer>

</body>
</html>
