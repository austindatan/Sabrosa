<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>

<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-grow">
    <div class="header-image w-full mt-[80px]">
      <img src="{{ asset('images/about_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <div class="about-image flex justify-center items-center gap-12 px-10 w-[65%] mx-auto" style="margin-top: 120px; margin-bottom: 70px;">
      <img src="{{ asset('images/sabrosa-card.png') }}" alt="Header Image" class="w-[300px] h-auto align-middle">

      <div class="max-w-xl">
        <h4 class="text-4xl font-bold text-[#1F27A6] mb-6 text-left font-[Poppins]">
          Our Story, Your Flavor Journey
        </h4>
        <p class="text-black text-lg font-dm-sans leading-relaxed text-justify">
          At <span class="text-[#1F27A6] font-semibold uppercase font-poppins">Sabrosa</span>, we believe that snacks should be more than just a quick bite; they should be a moment of joy. <br><br>
          Our journey began with a simple yet exciting idea: to craft snacks that elevate your snacking experience with bold flavors, creativity, and quality. Whether you're looking for something savory, sweet, or a little bit of both, we’ve got something to satisfy every craving.
        </p>
      </div>
    </div>

    <div class="mx-auto">
        <img src="{{ asset('images/about_brands_2.png') }}" class="w-[800px] object-contain mb-5 mx-auto">
        <img src="{{ asset('images/about_brands_1.png') }}" class="w-[800px] object-contain mx-auto">
    </div>

    <div class="about-image flex justify-center items-center gap-12 px-10 w-[65%] mx-auto mt-12 mb-12">

      <div class="max-w-xl flex flex-col items-start">
        <img src="{{ asset('images/about donuts.png') }}" alt="Header Image" class="w-[450px] h-auto align-middle">
        <p class="text-black text-lg font-dm-sans leading-relaxed text-justify">
          <span class="font-semibold text-[#1F27A6] uppercase font-poppins">Sabrosa</span> joins hand in hand with your favorite sweet and savory brands to bring you a mouth-watering shopping experience like no other. From indulgent treats to crave worthy snacks, we curate only the best delivered straight to your door, one delicious bite at a time.        </p>
        <button class="bg-[#1F27A6] text-white text-lg font-dm-sans px-8 py-3 rounded-xl hover:bg-pink-500 transition mt-4">
          <a href="{{ route('home') }}" class="block text-left font-dm-sans">Shop Now</a>
        </button>
      </div>

      <img src="{{ asset('images/about_meals.png') }}" alt="Header Image" class="w-[450px] h-auto align-middle">

    </div>
  </main>

  @include('pages.footer')

</body>
</html>
