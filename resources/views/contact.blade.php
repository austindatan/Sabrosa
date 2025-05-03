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

    <div class="about-image flex justify-center items-center gap-12 px-10" style="margin-top: 120px; margin-bottom: 70px;">
      <img src="{{ asset('images/sabrosa-card.png') }}" alt="Header Image" class="w-[300px] h-auto align-middle">

      <div class="max-w-xl">
        <h4 class="text-4xl font-bold text-[#1F27A6] mb-6 text-left font-[Poppins]">
          Our Story, Your Flavor Journey
        </h4>
        <p class="text-black text-lg font-[Poppins] leading-relaxed text-left">
          At <span class="text-[#1F27A6] font-semibold">Sabrosa</span>, CONTACT US
        </p>
      </div>
    </div>
  </main>

  @include('pages.footer')

</body>
</html>
