<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

    <div class="header-image w-full mt-[80px]">
        <img src="{{ asset('images/hero_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <section class="max-w-[1200px] mx-auto pt-12 px-4 sm:px-6 md:px-[60px] lg:px-[100px]">
      <div class="flex justify-between items-center w-full mb-7">
        <h4 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#1F27A6] font-[Poppins]">
          Tasty Treats
        </h4>
        <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[80px] sm:w-[100px] md:w-[120px] object-contain">
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach (['Donuts' => 'treats_donut.png', 'Cookies' => 'treats_cookies.png', 'Drinks' => 'treats_drinks.png', 'Meals' => 'treats_meals.png'] as $title => $image)
        <div class="bg-[#FDC0D0] border-2 border-[#E55182] rounded-[20px] flex flex-col justify-between transition duration-300 ease-in-out hover:shadow-md">
          <div class="aspect-[3/2] overflow-hidden rounded-t-[20px]">
            <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="w-full h-full object-cover">
          </div>
          <div class="bg-white p-4 flex items-center justify-between rounded-b-[20px]">
            <p class="font-[Barlow] text-sm sm:text-base text-black font-medium ml-[5px]">{{ $title }}</p>
            <div class="w-[20px] h-[20px] rounded-full flex items-center justify-center mr-[3px]">
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

    <div class="displayed-products flex flex-wrap justify-center items-center mt-10 gap-6 px-4">
      <x-home-card 
        name="Tropical Mango & Passionfruit Cookie" 
        image="images/product/product_sprites/Tropical Mango and Passionfruit Cookie.png" 
        price="P85" 
        :route="route('product.show', ['product' => 1])" 
        brand="images/brands/byronbay.png"
      />

      <x-home-card
        name="Complimentary Pairs SABROSA Originals"
        image="images/product/product_sprites/Complimentary Pairs SPICE Originals.png"
        price="P515"
        :route="route('product.show', ['product' => 20])"
        brand="images/brands/sabrosa.png"
      />

      <x-home-card
        name="BARBIE Peaches & Cream Soda"
        image="images/product/product_sprites/BARBIE Peaches & Cream Soda.png"
        price="P85"
        :route="route('product.show', ['product' => 42])"
        brand="images/brands/olipop.png"
      />
    </div>

    <div class="displayed-products flex flex-wrap justify-center items-center mt-10 gap-6 px-4">
      <x-home-card
        name="Way of the Strong  Special Mixed Yakisoba"
        image="images/product/product_sprites/Way of the Strong  Special Mixed Yakisoba.png"
        price="P145"
        :route="route('product.show', ['product' => 70])"
        brand="images/brands/sweetsparadise.png"
      />

      <x-home-card
        name="Tea Chest Jubilee Petite Pyramid"
        image="images/product/product_sprites/Tea Chest Jubilee Petite Pyramid.png"
        price="P635"
        :route="route('product.show', ['product' => 49])"
        brand="images/brands/teaforte.png"
      />

      <x-home-card
        name="Chobani Flip S`more S`mores"
        image="images/product/product_sprites/Chobani Flip S`more S`mores.png"
        price="P125"
        :route="route('product.show', ['product' => 26])"
        brand="images/brands/chobani.png"
      />
    </div>

    <div class="about-image flex flex-col lg:flex-row justify-center items-center mt-20 mb-16 gap-12 px-6 md:px-10">

      <img src="{{ asset('images/sabrosa-card.png') }}" alt="Header Image"
        class="w-64 md:w-80 lg:w-[300px] h-auto align-middle" />

      <div class="max-w-xl text-center lg:text-left">
        <h4 class="text-2xl md:text-3xl lg:text-2x1 font-bold text-[#1F27A6] mb-6 font-[Poppins] w-[350px] md:w-[450px] lg:w-[550px] mx-auto lg:mx-0">
          Our Story, Your Flavor Journey
        </h4>
        <p class="text-black text-base md:text-lg font-[Poppins] leading-relaxed text-justify w-[350px] md:w-[500px] lg:w-[600px] mx-auto lg:mx-0">
          At <span class="text-[#1F27A6] font-semibold">Sabrosa</span>, we believe that snacks should be more than just a quick bite; they should be a moment of joy.
          <br><br>
          Our journey began with a simple yet exciting idea: to craft snacks that elevate your snacking experience with bold flavors, creativity, and quality. Whether you're looking for something savory, sweet, or a little bit of both, we’ve got something to satisfy every craving.
        </p>
      </div>

    </div>
  </main>

  @include('pages.footer')

</body>
</html>
