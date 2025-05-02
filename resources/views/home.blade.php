<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sabrosa</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Barlow:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
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

    <div class="header-image w-full mt-[80px]">
        <img src="{{ asset('images/hero_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <section class="max-w-[1200px] mx-auto pt-[50px] px-6 sm:px-10 md:px-[60px] lg:px-[100px]">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center w-full mt-4 mb-7">
        <h4 class="text-3xl sm:text-4xl font-bold text-[#1F27A6] font-[Poppins] mb-4 sm:mb-0">
          Tasty Treats
        </h4>
        <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[100px] sm:w-[130px] object-contain">
      </div>

      <div class="flex gap-4 sm:gap-6 md:gap-8 overflow-x-auto pb-6 scroll-smooth snap-x snap-mandatory -mx-6 sm:-mx-10 md:-mx-[60px] lg:-mx-[100px] px-6 sm:px-10 md:px-[60px] lg:px-[100px] scrollbar-hide">
        
        @foreach (['Donuts' => 'treats_donut.png', 'Cookies' => 'treats_cookies.png', 'Drinks' => 'treats_drinks.png', 'Meals' => 'treats_meals.png'] as $title => $image)
        <div class="bg-[#FDC0D0] border-2 border-[#E55182] rounded-[20px] w-[180px] sm:w-[200px] md:w-[230px] flex-shrink-0 flex flex-col justify-between transition duration-300 ease-in-out hover:shadow-md">
          <div class="w-full h-[130px] sm:h-[140px] md:h-[150px] overflow-hidden">
            <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="w-full h-full object-cover rounded-t-[20px]">
          </div>
          <div class="bg-white p-4 flex items-center justify-between rounded-b-[20px]">
            <p class="font-[Barlow] text-sm sm:text-base text-black font-medium ml-[5px]">{{ $title }}</p>
            <div class="w-[16px] h-[16px] rounded-full mr-[3px]">
              <img src="{{ asset('images/arrow.png') }}" class="w-[17px] h-[17px]">
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </section>

    <section class="max-w-[1200px] mx-auto pt-[50px] px-6 sm:px-10 md:px-[60px] lg:px-[100px] flex items-center justify-center">
      <div class="flex flex-col items-center text-center">
        <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[130px] h-[50px] object-contain">
        
        <h5 class="text-2xl font-bold text-[#E55182] font-[Poppins] mt-1">
          Featured Items
        </h5>
        
        <p class="text-black font-[DM Sans] mt-3 px-4 sm:px-10 md:px-[100px] leading-[1.2] tracking-[0.2px]">
          Explore our signature items, crafted to perfection and bursting with flavors that will leave you craving more. Discover your new favorites today!
        </p>
      </div>
    </section>


    <div class="displayed-products flex justify-center items-center mt-10 gap-6">
      
      <x-product-card 
        name="Tropical Mango & Passionfruit Cookie" 
        image="images/product/product_sprites/Tropical Mango  & Passionfruit Cookie.png" 
        price="P85" 
        :route="route('product.show', ['product' => 1])" 
        brand="images/brands/byronbay.png"
      />

      <x-product-card
      name="Complimentary Pairs SABROSA Originals"
      image="images/product/product_sprites/Complimentary Pairs SPICE Originals.png"
      price="P515"
      :route="route('product.show', ['product' => 20])"
	    brand="images/brands/sabrosa.png"
      />

      <x-product-card
      name="BARBIE Peaches & Cream Soda"
      image="images/product/product_sprites/BARBIE Peaches & Cream Soda.png"
      price="P85"
      :route="route('product.show', ['product' => 42])"
	    brand="images/brands/olipop.png"
      />
    </div>

    <div class="displayed-products flex justify-center items-center mt-10 gap-6">
      <x-product-card
      name="Way of the Strong  Special Mixed Yakisoba"
      image="images/product/product_sprites/Way of the Strong  Special Mixed Yakisoba.png"
      price="P145"
      :route="route('product.show', ['product' => 70])"
	    brand="images/brands/sweetsparadise.png"
      />

      <x-product-card
      name="Tea Chest Jubilee Petite Pyramid "
      image="images/product/product_sprites/Tea Chest Jubilee Petite Pyramid.png"
      price="P635"
      :route="route('product.show', ['product' => 49])"
	    brand="images/brands/teaforte.png"
      />

      <x-product-card
      name="Chobani Flip S`more S`mores"
      image="images/product/product_sprites/Chobani Flip S`more S`mores.png"
      price="P125"
      :route="route('product.show', ['product' => 26])"
	    brand="images/brands/chobani.png"
      />
    </div>

      <div class="about-image flex justify-center items-center mt-25 mb-16 gap-12 px-10" style="margin-top: 120px; margin-bottom: 70px;">
        <img src="{{ asset('images/sabrosa-card.png') }}" alt="Header Image" class="w-[300px] h-auto align-middle">

        <div class="max-w-xl">
          <h4 class="text-4xl font-bold text-[#1F27A6] mb-6 text-left font-[Poppins]">
            Our Story, Your Flavor Journey
          </h4>
          <p class="text-black text-lg font-[Poppins] leading-relaxed text-left">
            At <span class="text-[#1F27A6] font-semibold">Sabrosa</span>, we believe that snacks should be more than just a quick bite; they should be a moment of joy. <br><br>
            Our journey began with a simple yet exciting idea: to craft snacks that elevate your snacking experience with bold flavors, creativity, and quality. Whether you're looking for something savory, sweet, or a little bit of both, we’ve got something to satisfy every craving.
          </p>
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
