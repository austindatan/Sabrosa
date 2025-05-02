<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>

<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden">

  @include('pages.header')
  <main class="flex-grow">
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
      image="images/product/product_sprites/Tropical Mango  & Passionfruit Cookie.png" 
      price="P85" 
      :route="route('product.show', ['product' => 1])" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Granola, Blueberry  & Chia Cookie" 
      image="images/product/product_sprites/Granola, Blueberry  & Chia Cookie.png" 
      price="P85" 
      :route="route('product.show', ['product' => 2])" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Blueberry Muffin Cookie" 
      image="images/product/product_sprites/Blueberry Muffin Cookie.png" 
      price="P85" 
      :route="route('product.show', ['product' => 3])" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Toasted Coconut & White Cookie Bites" 
      image="images/product/product_sprites/Toasted Coconut & White Cookie Bites.png" 
      price="P55" 
      :route="route('product.show', ['product' => 4])" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="Vegan Gluten Maple & Pecan Cookie Jar" 
      image="images/product/product_sprites/Vegan Gluten Maple & Pecan Cookie Jar.png" 
      price="P675" 
      :route="route('product.show', ['product' => 5])" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card 
      name="12 Pack Mixed Cookie Box" 
      image="images/product/product_sprites/12 Pack Mixed Cookie Box.png" 
      price="P675" 
      :route="route('product.show', ['product' => 6])" 
      brand="images/brands/byronbay.png"
    />

    <x-product-card
      name="2024 Pride Cookie Limiteds"
      image="images/product/product_sprites/2024 Pride Cookie Limiteds.png"
      price="P115"
      :route="route('product.show', ['product' => 7])"
	  brand="images/brands/byronbay.png"
    />

    <x-product-card
      name="Traditional Shortbread"
      image="images/product/product_sprites/Traditional Shortbread.png"
      price="P105"
      :route="route('product.show', ['product' => 8])"
	  brand="images/brands/byronbay.png"
    />

    <x-product-card
      name="Cherry Bakewell Oak Boosts"
      image="images/product/product_sprites/Cherry Bakewell Oak Boosts.png"
      price="P105"
      :route="route('product.show', ['product' => 9])"
	  brand="images/brands/graze.png"
    />

    <x-product-card
      name="Laduree x Bridgerton Macaron Box"
      image="images/product/product_sprites/Laduree x Bridgerton Macaron Box.png"
      price="P475"
      :route="route('product.show', ['product' => 10])"
	  brand="images/brands/laduree.png"
    />


    <x-product-card
      name="Macaron Pyramid SABROSA Originals"
      image="images/product/product_sprites/Macaron Pyramid SPICE Originals.png"
      price="P1175"
      :route="route('product.show', ['product' => 11])"
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
      image="images/product/product_sprites/Strawberry Shortcake Donut Bites.png" 
      price="P475" 
      :route="route('product.show', ['product' => 12])" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Party Bites! Donut Bites" 
      image="images/product/product_sprites/Party Bites! Donut Bites.png" 
      price="P475" 
      :route="route('product.show', ['product' => 13])" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Orange Dreamsicle Donut Bites" 
      image="images/product/product_sprites/Orange Dreamsicle Donut Bites.png" 
      price="P475" 
      :route="route('product.show', ['product' => 14])" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Maple Glazed Donut Bites" 
      image="images/product/product_sprites/Maple Glazed Donut Bites.png" 
      price="P475" 
      :route="route('product.show', ['product' => 15])" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Lemon Poppy Donut Bites" 
      image="images/product/product_sprites/Lemon Poppy Donut Bites.png" 
      price="P475" 
      :route="route('product.show', ['product' => 16])" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card 
      name="Chocolate Truffle Donut Bites" 
      image="images/product/product_sprites/Chocolate Truffle Donut Bites.png" 
      price="P475" 
      :route="route('product.show', ['product' => 17])" 
      brand="images/brands/bluestar.png"
    />

    <x-product-card
      name="1 Dozen Original Glazed Donuts"
      image="images/product/product_sprites/1 Dozen Original Glazed Donuts.png"
      price="P449"
      :route="route('product.show', ['product' => 18])"
	  brand="images/brands/krispykreme.png"
    />

    <x-product-card
      name="PARTY Box SABROSA Originals"
      image="images/product/product_sprites/PARTY Box SPICE Originals.png"
      price="P515"
      :route="route('product.show', ['product' => 19])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Complimentary Pairs SABROSA Originals"
      image="images/product/product_sprites/Complimentary Pairs SPICE Originals.png"
      price="P515"
      :route="route('product.show', ['product' => 20])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Brioche Box SABROSA Originals"
      image="images/product/product_sprites/Brioche Box SPICE Originals.png"
      price="P515"
      :route="route('product.show', ['product' => 21])"
	  brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Cake-it-Easy Box SABROSA Originals"
      image="images/product/product_sprites/Cake-it-Easy Box SPICE Originals.png"
      price="P515"
      :route="route('product.show', ['product' => 22])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Brunch Box SABROSA Originals"
      image="images/product/product_sprites/Brunch Box SPICE Originals.png"
      price="P515"
      :route="route('product.show', ['product' => 23])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Disney INSIDE OUT 2 Donut Box"
      image="images/product/product_sprites/Disney INSIDE OUT 2 Donut Box.png"
      price="P485"
      :route="route('product.show', ['product' => 24])"
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
      image="images/product/product_sprites/Luxury Gourmet Chocolate Mix.png"
      price="P815"
      :route="route('product.show', ['product' => 25])"
	    brand="images/brands/compartes.png"
    />

    <x-product-card
      name="Chobani Flip S`more S`mores"
      image="images/product/product_sprites/Chobani Flip S`more S`mores.png"
      price="P125"
      :route="route('product.show', ['product' => 26])"
	    brand="images/brands/chobani.png"
    />


    <x-product-card 
    name="Strawberry Shortcake Chocolate Bar"
    image="images/product/product_sprites/Strawberry Shortcake Chocolate Bar.png"
    price="P115"
    :route="route('product.show', ['product' => 27])"
    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="Lavender Chocolate Bar"
      image="images/product/product_sprites/Lavender Chocolate Bar.png"
      price="P115"
      :route="route('product.show', ['product' => 28])"
	    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="Campfire S’mores Chocolate Bar"
      image="images/product/product_sprites/Campfire S’mores Chocolate Bar.png"
      price="P115"
      :route="route('product.show', ['product' => 28])"
	    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="California Love Pretzel Chocolate Bar"
      image="images/product/product_sprites/California Love Pretzel Chocolate Bar.png"
      price="P115"
      :route="route('product.show', ['product' => 30])"
	    brand="images/brands/compartes.png"
    />


    <x-product-card
      name="Cereal Bowl Gourmet Chocolate Bar"
      image="images/product/product_sprites/Cereal Bowl Gourmet Chocolate Bar.png"
      price="P115"
      :route="route('product.show', ['product' => 31])"
	    brand="images/brands/compartes.png"
    />

    <x-product-card
      name="Bucket Glazed Cake Bites"
      image="images/product/product_sprites/Bucket Glazed Cake Bites.png"
      price="P339"
      :route="route('product.show', ['product' => 32])"
	    brand="images/brands/krispykreme.png"
    />

    <x-product-card
      name="Hollywood x sugarfina Candy Cove"
      image="images/product/product_sprites/Hollywood x sugarfina Candy Cove.png"
      price="P675"
      :route="route('product.show', ['product' => 33])"
	    brand="images/brands/sugarfina.png"
    />

    <x-product-card
      name="Red Velvet Cake SABROSA Originals"
      image="images/product/product_sprites/Red Velvet Cake SPICE Originals.png"
      price="P675"
      :route="route('product.show', ['product' => 34])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Cake Framboise SABROSA Originals"
      image="images/product/product_sprites/Cake Framboise SPICE Originals.png"
      price="P675"
      :route="route('product.show', ['product' => 35])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Cake Confetti SABROSA Originals"
      image="images/product/product_sprites/Cake Confetti SPICE Originals.png"
      price="P675"
      :route="route('product.show', ['product' => 36])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Chocolate Caramel SABROSA Originals"
      image="images/product/product_sprites/Chocolate Caramel SPICE Originals.png"
      price="P675"
      :route="route('product.show', ['product' => 37])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Bridesmaid Cake SABROSA Originals"
      image="images/product/product_sprites/Bridesmaid Cake SPICE Originals.png"
      price="P1175"
      :route="route('product.show', ['product' => 38])"
	    brand="images/brands/sabrosa.png"
    />

    <x-product-card
      name="Chobani Creations Cherry Cheesecake"
      image="images/product/product_sprites/Chobani Creations Cherry Cheesecake.png"
      price="P435"
      :route="route('product.show', ['product' => 39])"
	    brand="images/brands/chobani.png"
    />
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Drinks & Tea</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="drinksAndTealeftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="drinksAndTearightArrow()">&#10095;</button>
    </div>
  </div>
  <div id="drinksAndTeaslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
    <x-product-card
      name="Stunning Strategem Flurry Cocktail Mix"
      image="images/product/product_sprites/Stunning Strategem Flurry Cocktail Mix.png"
      price="P55"
      :route="route('product.show', ['product' => 40])"
	    brand="images/brands/sweetsparadise.png"
    />

    <x-product-card
      name="Caramel Choco Boba Milk Tea"
      image="images/product/product_sprites/Caramel Choco Boba Milk Tea.png"
      price="P80"
      :route="route('product.show', ['product' => 41])"
	    brand="images/brands/sweetsparadise.png"
    />

    <x-product-card
      name="BARBIE Peaches & Cream Soda"
      image="images/product/product_sprites/BARBIE Peaches & Cream Soda.png"
      price="P85"
      :route="route('product.show', ['product' => 42])"
	    brand="images/brands/olipop.png"
    />

    <x-product-card
      name="Crisp Apple Soda"
      image="images/product/product_sprites/Crisp Apple Soda.png"
      price="P85"
      :route="route('product.show', ['product' => 43])"
	    brand="images/brands/olipop.png"
    />

    <x-product-card
      name="Cherry Vanilla Soda"
      image="images/product/product_sprites/Cherry Vanilla Soda.png"
      price="P85"
      :route="route('product.show', ['product' => 44])"
	    brand="images/brands/olipop.png"
    />

    <x-product-card
      name="Banana Cream Soda"
      image="images/product/product_sprites/Banana Cream Soda.png"
      price="P85"
      :route="route('product.show', ['product' => 45])"
	    brand="images/brands/olipop.png"
    />

    <x-product-card
      name="Ruby Mini  Petite Pyramid "
      image="images/product/product_sprites/Ruby Mini  Petite Pyramid.png"
      price="P435"
      :route="route('product.show', ['product' => 46])"
	    brand="images/brands/teaforte.png"
    />

    <x-product-card
      name="Herbal Retreat Pyramid Tea Box"
      image="images/product/product_sprites/Herbal Retreat Pyramid Tea Box.png"
      price="P635"
      :route="route('product.show', ['product' => 47])"
	    brand="images/brands/teaforte.png"
    />

    <x-product-card
      name="Chai Lovers Petite Pyramid "
      image="images/product/product_sprites/Chai Lovers Petite Pyramid.png"
      price="P535"
      :route="route('product.show', ['product' => 48])"
	    brand="images/brands/teaforte.png"
    />

    <x-product-card
      name="Tea Chest Jubilee Petite Pyramid "
      image="images/product/product_sprites/Tea Chest Jubilee Petite Pyramid.png"
      price="P635"
      :route="route('product.show', ['product' => 49])"
	    brand="images/brands/teaforte.png"
    />

    <x-product-card
      name="Champagne Bears"
      image="images/product/product_sprites/Champagne Bears.png"
      price="P875"
      :route="route('product.show', ['product' => 50])"
	    brand="images/brands/sugarfina.png"
    />

    <x-product-card
      name="Chobani Oatmilk Zero Sugar Original"
      image="images/product/product_sprites/Chobani Oatmilk Zero Sugar Original.png"
      price="P265"
      :route="route('product.show', ['product' => 51])"
	    brand="images/brands/chobani.png"
    />

    <x-product-card
      name="Chobani  Oatmilk Vanilla"
      image="images/product/product_sprites/Chobani  Oatmilk Vanilla.png"
      price="P315"
      :route="route('product.show', ['product' => 52])"
	    brand="images/brands/chobani.png"
    />


    <x-product-card
      name="Peppermint Mocha  Coffee Creamer"
      image="images/product/product_sprites/Peppermint Mocha  Coffee Creamer.png"
      price="P385"
      :route="route('product.show', ['product' => 53])"
	    brand="images/brands/chobani.png"
    />

    <x-product-card
      name="Chobani Oatmilk Barista Original"
      image="images/product/product_sprites/Chobani Oatmilk Barista Original.png"
      price="P315"
      :route="route('product.show', ['product' => 54])"
	    brand="images/brands/chobani.png"
    />

    <x-product-card
      name="Chobani Oatmilk Extra Creamy"
      image="images/product/product_sprites/Chobani Oatmilk Extra Creamy.png"
      price="P315"
      :route="route('product.show', ['product' => 55])"
	    brand="images/brands/chobani.png"
    />

    <x-product-card
      name="Zero Sugar Greek Yogurt Strawberry"
      image="images/product/product_sprites/Zero Sugar Greek Yogurt Strawberry.png"
      price="P155"
      :route="route('product.show', ['product' => 56])"
	    brand="images/brands/chobani.png"
    />

    <x-product-card
      name="Zero Sugar Greek Yogurt Mixed Berry"
      image="images/product/product_sprites/Zero Sugar Greek Yogurt Mixed Berry.png"
      price="P345"
      :route="route('product.show', ['product' => 57])"
	    brand="images/brands/chobani.png"
    />
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Meals</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="mealsleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="mealsrightArrow()">&#10095;</button>
    </div>
  </div>
  <div id="mealsslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">

    <x-product-card
      name="Le Haut Special Steak Plate"
      image="images/product/product_sprites/Le Haut Special Steak Plate.png"
      price="P435"
      :route="route('product.show', ['product' => 58])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Perfect Puddling a la Moode"
      image="images/product/product_sprites/Perfect Puddling a la Moode.png"
      price="P235"
      :route="route('product.show', ['product' => 59])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Sutera’s Pot-au-Feu"
      image="images/product/product_sprites/Sutera’s Pot-au-Feu.png"
      price="P115"
      :route="route('product.show', ['product' => 60])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Nyan Milk Set for a Special Time"
      image="images/product/product_sprites/Nyan Milk Set for a Special Time.png"
      price="P55"
      :route="route('product.show', ['product' => 61])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Dragon Noodles & Sausage"
      image="images/product/product_sprites/Dragon Noodles & Sausage Combo.png"
      price="P235"
      :route="route('product.show', ['product' => 62])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Fiendarce Steak Platter"
      image="images/product/product_sprites/Fiendarce Steak Platter.png"
      price="P145"
      :route="route('product.show', ['product' => 63])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Sauteed  Grudge Chunks"
      image="images/product/product_sprites/Sauteed  Grudge Chunks.png"
      price="P325"
      :route="route('product.show', ['product' => 64])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Evoker Nier Tea Set"
      image="images/product/product_sprites/Evoker Nier Tea Set.png"
      price="P125"
      :route="route('product.show', ['product' => 65])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="FFFries Off, Tempura Plate"
      image="images/product/product_sprites/FFFries Off, Tempura Plate.png"
      price="P119"
      :route="route('product.show', ['product' => 66])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Auguste  Fisheries"
      image="images/product/product_sprites/Auguste  Fisheries.png"
      price="P145"
      :route="route('product.show', ['product' => 67])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="Garlic Vegetables  Tsukemen "
      image="images/product/product_sprites/Garlic Vegetables  Tsukemen.png"
      price="P165"
      :route="route('product.show', ['product' => 68])"
	    brand="images/brands/granbluekitchen.png"
    />

    <x-product-card
      name="All Weather Beauty"
      image="images/product/product_sprites/All Weather Beauty.png"
      price="P235"
      :route="route('product.show', ['product' => 69])"
	    brand="images/brands/sweetsparadise.png"
    />

    <x-product-card
      name="Way of the Strong  Special Mixed Yakisoba"
      image="images/product/product_sprites/Way of the Strong  Special Mixed Yakisoba.png"
      price="P145"
      :route="route('product.show', ['product' => 70])"
	    brand="images/brands/sweetsparadise.png"
    />

    <x-product-card
      name="Victorious Legend Tonkotsu Ramen"
      image="images/product/product_sprites/Victorious Legend Tonkotsu Ramen.png"
      price="P155"
      :route="route('product.show', ['product' => 71])"
	    brand="images/brands/sweetsparadise.png"
    />

    <x-product-card
      name="Hot Pot Assortments Platter"
      image="images/product/product_sprites/Hot Pot Assortments Platter.png"
      price="P85"
      :route="route('product.show', ['product' => 72])"
	    brand="images/brands/sweetsparadise.png"
    />


    <x-product-card
      name="Summer  Festival Fish"
      image="images/product/product_sprites/Summer  Festival Fish.png"
      price="P85"
      :route="route('product.show', ['product' => 73])"
	    brand="images/brands/sweetsparadise.png"
    />


    <x-product-card
      name="Maple Drizzle  & Chopped-Bacon"
      image="images/product/product_sprites/Maple Drizzle  & Chopped-Bacon.png"
      price="P145"
      :route="route('product.show', ['product' => 74])"
	    brand="images/brands/sabrosa.png"
    />
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">We also have!</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="MICleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="MICrightArrow()">&#10095;</button>
    </div>
  </div>
  <div id="MICslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide">

    <x-product-card
      name="Luxury Candy  Cubes Gift Box"
      image="images/product/product_sprites/Luxury Candy  Cubes Gift Box.png"
      price="P515"
      :route="route('product.show', ['product' => 75])"
	    brand="images/brands/sugarfina.png"
    />

    <x-product-card
      name="Vacation Vibes Candy Cubes"
      image="images/product/product_sprites/Vacation Vibes Candy Cubes.png"
      price="P315"
      :route="route('product.show', ['product' => 76])"
	    brand="images/brands/sugarfina.png"
    />

    <x-product-card
      name="5 Assortment Candy Cubes"
      image="images/product/product_sprites/5 Assortment Candy Cubes.png"
      price="P225"
      :route="route('product.show', ['product' => 77])"
	    brand="images/brands/sugarfina.png"
    />

    <x-product-card
      name="Candy  Bento Box"
      image="images/product/product_sprites/Candy  Bento Box.png"
      price="P745"
      :route="route('product.show', ['product' => 78])"
	    brand="images/brands/sugarfina.png"
    />


    <x-product-card
      name="Bridesmaid Party Candy Cubes"
      image="images/product/product_sprites/Bridesmaid Party Candy Cubes.png"
      price="P315"
      :route="route('product.show', ['product' => 79])"
	    brand="images/brands/sugarfina.png"
    />
  </div>

</div>

  </div>
</main>
  @include('pages.footer')
  
</body>
</html>
