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

        <div class="about-image flex justify-center items-center mt-25 mb-16 gap-12 px-10" style="margin-top: 120px; margin-bottom: 70px;">
            <img src="{{ asset('images/sabrosa_card_white.png') }}" alt="Header Image" class="w-[300px] h-auto align-middle">

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
    </main>

    @include('pages.footer')

</body>
</html>
