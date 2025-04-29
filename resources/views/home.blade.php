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

  <header>
    <nav class="flex justify-between items-center p-10 bg-pink-100 text-[#1F27A6] shadow-md fixed top-0 left-0 w-full z-10 font-poppins font-medium">
      <button class="flex flex-col gap-1.5 bg-none border-0 cursor-pointer absolute left-5 top-5 md:hidden" aria-label="Toggle menu">
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
      </button>

      <div class="absolute left-1/2 transform -translate-x-1/2">
        <a href="index.html">
          <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[270px] h-[100px] hover:underline">
        </a>
      </div>

      <ul class="hidden md:flex gap-12 pl-20">
        <li><a href="about.html" class="hover:underline text-lg">Shop</a></li>
        <li><a href="contact.html" class="hover:underline text-lg">About</a></li>
        <li><a href="contact.html" class="hover:underline text-lg">Contact</a></li>
      </ul>

      <div class="hidden md:flex gap-6 pr-20 ml-auto">
        <a href="https://www.facebook.com/austin.datan/" target="_blank"><img src="{{ asset('images/fb_logo.png') }}" alt="Facebook" class="w-6 h-6 invert"></a>
        <a href="https://www.instagram.com/dilan_06p5/" target="_blank"><img src="{{ asset('images/instagram_logo.png') }}" alt="Instagram" class="w-6 h-6 invert"></a>
        <a href="https://www.linkedin.com/in/austindatan/" target="_blank"><img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn" class="w-6 h-6"></a>
      </div>
    </nav>
  </header>

  <div class="w-full mt-[80px]">
    <img src="{{ asset('images/shop_banner.png') }}" alt="Header Image" class="w-full h-auto">
  </div>

  <div class="relative overflow-hidden max-w-[2220px] mx-auto pt-[50px] px-[100px] pb-0 mb-[100px]">

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Cookies</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cookiesleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cookiesrightArrow()">&#10095;</button>
    </div>  </div>

  <div id="cookiesslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]"> 
    <x-product-card 
      name="Tropical Mango & Passionfruit Cookie" 
      image="images/product/product sprites/Tropical Mango  & Passionfruit Cookie.png" 
      price="P85" 
      :route="route('tropical.show')" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Granola, Blueberry  & Chia Cookie" 
      image="images/product/product sprites/Granola, Blueberry  & Chia Cookie.png" 
      price="P85" 
      :route="route('tropical.show')" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Blueberry Muffin Cookie" 
      image="images/product/product sprites/Blueberry Muffin Cookie.png" 
      price="P85" 
      :route="route('tropical.show')" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Toasted Coconut & White Cookie Bites" 
      image="images/product/product sprites/Toasted Coconut & White Cookie Bites.png" 
      price="P55" 
      :route="route('tropical.show')" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Vegan Gluten Maple & Pecan Cookie Jar" 
      image="images/product/product sprites/Vegan Gluten Maple & Pecan Cookie Jar.png" 
      price="P675" 
      :route="route('tropical.show')" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="12 Pack Mixed Cookie Box" 
      image="images/product/product sprites/12 Pack Mixed Cookie Box.png" 
      price="P675" 
      :route="route('tropical.show')" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card
      name="2024 Pride Cookie Limiteds"
      image="images/product/product sprites/2024 Pride Cookie Limiteds.png"
      price="P115"
      :route="route('tropical.show')"
	  brand="images/brands/byronbay.png"
    />

    <x-product-card
      name="Traditional Shortbread"
      image="images/product/product sprites/Traditional Shortbread.png"
      price="P105"
      :route="route('tropical.show')"
	  brand="images/brands/byronbay.png"
    />

    <x-product-card
      name="Cherry Bakewell Oak Boosts"
      image="images/product/product sprites/Cherry Bakewell Oak Boosts.png"
      price="P105"
      :route="route('tropical.show')"
	  brand="images/brands/graze.png"
    />

    <x-product-card
      name="Laduree x Bridgerton Macaron Box"
      image="images/product/product sprites/Laduree x Bridgerton Macaron Box.png"
      price="P475"
      :route="route('tropical.show')"
	  brand="images/brands/laduree.png"
    />


    <x-product-card
      name="Macaron Pyramid SABROSA Originals"
      image="images/product/product sprites/Macaron Pyramid SPICE Originals.png"
      price="P1175"
      :route="route('tropical.show')"
	  brand="images/brands/sabrosa.png"
    />
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Donuts</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="donutsleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="donutsrightArrow()">&#10095;</button>
    </div>
  </div>

  <div id="donutsslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]"> 
    <x-product-card 
      name="Strawberry Shortcake Donut Bites" 
      image="images/product/product sprites/Strawberry Shortcake Donut Bites.png" 
      price="P475" 
      :route="route('tropical.show')" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Party Bites! Donut Bites" 
      image="images/product/product sprites/Party Bites! Donut Bites.png" 
      price="P475" 
      :route="route('tropical.show')" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Orange Dreamsicle Donut Bites" 
      image="images/product/product sprites/Orange Dreamsicle Donut Bites.png" 
      price="P475" 
      :route="route('tropical.show')" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Maple Glazed Donut Bites" 
      image="images/product/product sprites/Maple Glazed Donut ites.png" 
      price="P475" 
      :route="route('tropical.show')" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Lemon Poppy Donut Bites" 
      image="images/product/product sprites/Lemon Poppy Donut Bites.png" 
      price="P475" 
      :route="route('tropical.show')" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Chocolate Truffle Donut Bites" 
      image="images/product/product sprites/Chocolate Truffle Donut Bites.png" 
      price="P475" 
      :route="route('tropical.show')" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card
      name="1 Dozen Original Glazed Donuts"
      image="images/product/product sprites/1 Dozen Original Glazed Donuts.png"
      price="P449"
      :route="route('tropical.show')"
	  brand="images/brands/krispykreme.png"
    />

    <x-product-card
      name="PARTY Box SABROSA Originals"
      image="images/product/product sprites/PARTY Box SPICE Originals.png"
      price="P515"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Complimentary Pairs SABROSA Originals"
      image="images/product/product sprites/Complimentary Pairs SPICE Originals.png"
      price="P515"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Brioche Box SABROSA Originals"
      image="images/product/product sprites/Brioche Box SPICE Originals.png"
      price="P515"
      :route="route('tropical.show')"
	  brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Cake-it-Easy Box SABROSA Originals"
      image="images/product/product sprites/Cake-it-Easy Box SPICE Originals.png"
      price="P515"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Brunch Box SABROSA Originals"
      image="images/product/product sprites/Brunch Box SPICE Originals.png"
      price="P515"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Disney INSIDE OUT 2 Donut Box"
      image="images/product/product sprites/Disney INSIDE OUT 2 Donut Box.png"
      price="P485"
      :route="route('tropical.show')"
	    brand="images/brands/krispykreme.png"
    />
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Cakes & Chocolates</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cakesleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cakesrightArrow()">&#10095;</button>
    </div>
  </div>

  <div id="cakesslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
    <x-product-card
      name="Luxury Gourmet Chocolate Mix"
      image="images/product/product sprites/Luxury Gourmet Chocolate Mix.png"
      price="P815"
      :route="route('tropical.show')"
	    brand="images/brands/compartes.png"
    />

    <x-product-card
      name="Chobani Flip S`more S`mores"
      image="images/product/product sprites/Chobani Flip S`more S`mores.png"
      price="P125"
      :route="route('tropical.show')"
	    brand="images/brands/chobani.png"
    />


    <x-product-card
      name="Strawberry Shortcake Chocolate Bar"
      image="images/product/product sprites/Strawberry Shortcake Chocolate Bar.png"
      price="P115"
      :route="route('tropical.show')"
	    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="Lavender Chocolate Bar"
      image="images/product/product sprites/Lavender Chocolate Bar.png"
      price="P115"
      :route="route('tropical.show')"
	    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="Campfire S’mores Chocolate Bar"
      image="images/product/product sprites/Campfire S’mores Chocolate Bar.png"
      price="P115"
      :route="route('tropical.show')"
	    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="California Love Pretzel Chocolate Bar"
      image="images/product/product sprites/California Love Pretzel Chocolate Bar.png"
      price="P115"
      :route="route('tropical.show')"
	    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="Cereal Bowl Gourmet Chocolate Bar"
      image="images/product/product sprites/Cereal Bowl Gourmet Chocolate Bar.png"
      price="P115"
      :route="route('tropical.show')"
	    brand="images/brands/compartes.png"
    />

    <x-product-card
      name="Bucket Glazed Cake Bites"
      image="images/product/product sprites/Bucket Glazed Cake Bites.png"
      price="P339"
      :route="route('tropical.show')"
	    brand="images/brands/krispykreme.png"
    />

    <x-product-card
      name="Hollywood x sugarfina Candy Cove"
      image="images/product/product sprites/Hollywood x sugarfina Candy Cove.png"
      price="P675"
      :route="route('tropical.show')"
	    brand="images/brands/sugarfina.png"
    />

    <x-product-card
      name="Red Velvet Cake SABROSA Originals"
      image="images/product/product sprites/Red Velvet Cake SPICE Originals.png"
      price="P675"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Cake Framboise SABROSA Originals"
      image="images/product/product sprites/Cake Framboise SPICE Originals.png"
      price="P675"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Cake Confetti SABROSA Originals"
      image="images/product/product sprites/Cake Confetti SPICE Originals.png"
      price="P675"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Chocolate Caramel SABROSA Originals"
      image="images/product/product sprites/Chocolate Caramel SPICE Originals.png"
      price="P675"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Bridesmaid Cake SABROSA Originals"
      image="images/product/product sprites/Bridesmaid Cake SPICE Originals.png"
      price="P1175"
      :route="route('tropical.show')"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Chobani Creations Cherry Cheesecake"
      image="images/product/product sprites/Chobani Creations Cherry Cheesecake.png"
      price="P435"
      :route="route('tropical.show')"
	    brand="images/brands/chobani.png"
    />
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
