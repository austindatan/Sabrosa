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
        <img src="{{ asset('images/about_banner.png') }}" alt="Header Image" class="w-full h-auto">
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
