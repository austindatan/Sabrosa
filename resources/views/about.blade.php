<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>

<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-grow">
    <!-- Header Banner -->
    <div class="header-image w-full mt-[80px]">
      <img src="{{ asset('images/about_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <div class="about-image flex flex-col lg:flex-row justify-center items-center mt-20 mb-16 gap-12 px-6 md:px-10">

      <img src="{{ asset('images/sabrosa-card.png') }}" alt="Header Image" class="w-64 md:w-80 lg:w-[300px] h-auto align-middle" />

      <div class="max-w-xl text-center lg:text-left">
        <h4 class="text-2xl md:text-3xl lg:text-2x1 font-bold text-[#1F27A6] mb-6 font-[Poppins] w-[350px] md:w-[450px] lg:w-[550px] mx-auto lg:mx-0">
          Our Story, Your Flavor Journey
        </h4>
        <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify w-[350px] md:w-[500px] lg:w-[600px] mx-auto lg:mx-0">
          At <span class="text-[#1F27A6] font-semibold">Sabrosa</span>, we believe that snacks should be more than just a quick bite; they should be a moment of joy.
          <br><br>
          Our journey began with a simple yet exciting idea: to craft snacks that elevate your snacking experience with bold flavors, creativity, and quality. Whether you're looking for something savory, sweet, or a little bit of both, we’ve got something to satisfy every craving.
        </p>
      </div>

    </div>

    <div class="flex flex-col items-center gap-12 px-6 md:px-10 mt-20 mb-16">
      <img src="{{ asset('images/about_brands_1.png') }}" alt="Header Image" class="w-[350px] md:w-[550px] lg:w-[700px] h-auto" />
      <img src="{{ asset('images/about_brands_2.png') }}" alt="Header Image" class="w-[350px] md:w-[550px] lg:w-[700px] h-auto" />
    </div>


    <div class="about-image flex flex-col lg:flex-row justify-center items-center mt-20 mb-16 gap-12 px-6 md:px-10">

      <img src="{{ asset('images/about_meals.png') }}" alt="Header Image" class="w-64 md:w-80 lg:w-[300px] h-auto align-middle" />

      <div class="max-w-xl text-center lg:text-left">

        <img src="{{ asset('images/about donuts.png') }}" alt="Header Image" class="w-64 md:w-80 lg:w-[300px] h-auto align-middle" />

        <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify w-[350px] md:w-[500px] lg:w-[600px] mx-auto lg:mx-0">
          <span class="span class="text-[#1F27A6] font-semibold">Sabrosa</span> joins hand in hand with your favorite sweet and savory brands to bring you a mouth-watering shopping experience like no other. From indulgent treats to crave-worthy snacks, we curate only the best delivered straight to your door, one delicious bite at a time.
        </p>

        <button class="bg-[#1F27A6] text-white text-lg font-dm-sans px-8 py-3 rounded-xl hover:bg-pink-500 transition mt-4">
            <a href="{{ route('home') }}" class="block font-dm-sans">Shop Now</a>
        </button>
      </div>

    </div>

  </main>

  @include('pages.footer')

</body>
</html>
