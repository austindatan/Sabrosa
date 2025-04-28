<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabrosa</title>
    @vite(['resources/css/index.css', 'resources/js/index.js'])
    <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
</head>
<body class="bg-cover bg-center transition-opacity duration-500 ease-in-out opacity-0">
    <header>
        <nav class="navbar flex justify-between items-center p-10 bg-[#FFEBF0] text-white shadow-md fixed top-0 left-0 w-full z-10">
            <ul class="nav-links">
                <li><a href="about.html">Shop</a></li>
                <li><a href="contact.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <button class="menu-toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="logo"><a href="index.html"><img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="logo-apollo"></a></div>
            <div class="social-icons">
                <a href="https://www.facebook.com/austin.datan/" target="_blank"><img src="{{ asset('images/fb_logo.png') }}" alt="Facebook"></a>
                <a href="https://www.instagram.com/dilan_06p5/" target="_blank"><img src="{{ asset('images/instagram_logo.png') }}" alt="Instagram"></a>
                <a href="https://www.linkedin.com/in/austindatan/" class="linkedin" target="_blank"><img src="{{ asset('images/linkedin.png') }}" alt="Email"></a>
            </div>
        </nav>
    </header>

    <div class="header-image w-full">
        <img src="{{ asset('images/hero_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <section class="treats-section">
      <div class="treats-header">
          <h4  class="text-4xl font-bold text-[#1F27A6] mb-12 text-left font-[Poppins]">Tasty Treats</h4>
          <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="treats-logo">
      </div>
        <div class="treats-carousel">
          <div class="treat-card">
            <div class="image-wrapper">
              <img src="{{ asset('images/treats_donut.png') }}" alt="Donuts">
            </div>
            <div class="card-footer">
              <p>Donuts</p>
              <div class="dot"><img src="{{ asset('images/arrow.png') }}"></div>
            </div>
          </div>
          <div class="treat-card">
            <div class="image-wrapper">
              <img src="{{ asset('images/treats_cookies.png') }}" alt="Cookies">
            </div>
            <div class="card-footer">
              <p>Cookies</p>
              <div class="dot"><img src="{{ asset('images/arrow.png') }}"></div>
            </div>
          </div>
          <div class="treat-card">
            <div class="image-wrapper">
              <img src="{{ asset('images/treats_drinks.png') }}" alt="Drinks">
            </div>
            <div class="card-footer">
              <p>Drinks</p>
              <div class="dot"><img src="{{ asset('images/arrow.png') }}"></div>
            </div>
          </div>
          <div class="treat-card">
            <div class="image-wrapper">
              <img src="{{ asset('images/treats_meals.png') }}" alt="Meals">
            </div>
            <div class="card-footer">
              <p>Meals</p>
              <div class="dot"><img src="{{ asset('images/arrow.png') }}"></div>
            </div>
          </div>
        </div>
      </section>

      <section class="product-section flex items-center justify-center">

        <div class="product-header flex flex-col items-center text-center">
            <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="product-logo mx-auto">
            <h5 class="text-2xl font-bold text-[#E55182] font-[Poppins]">Featured Items</h5>
            <p class="text-black font-[DM Sans]">Explore our signature items, crafted to perfection and bursting with flavors that will leave you craving more. Discover your new favorites today!</p>
        </div>
        </section>

        <div class="displayed-products flex justify-center items-center mt-10">

          <div class="product-card">
            <div class="product-wrapper">
              <img src="{{ asset('images/product/tropical.png') }}" alt="Tropical Mango & Passionfruit Cookie">
            </div>
            <img src="{{ asset('images/brands/byronbay.png') }}" alt="Byron Bay Logo" class="brand-logo">

            <div class="product-footer">
              <div class="product-info">
                <p>Tropical Mango & Passionfruit Cookie</p>
              </div>
              <a href="{{ route('tropical.show') }}" class="price-badge">P85</a>
            </div>
          </div>

          <div class="product-card">
            <div class="product-wrapper">
              <img src="{{ asset('images/product/don.png') }}" alt="Complimentary Pairs Sabrosa Original">
            </div>
            <img src="{{ asset('images/brands/sabrosa.png') }}" alt="Byron Bay Logo" class="brand-logo">

            <div class="product-footer">
              <div class="product-info">
                <p>Complimentary Pairs Sabrosa Originals</p>
              </div>
              <a href="{{ route('don.show') }}" class="price-badge">P515</a>
            </div>
          </div>

          <div class="product-card">
            <div class="product-wrapper">
              <img src="{{ asset('images/product/barbie.png') }}" alt="Tropical Mango & Passionfruit Cookie">
            </div>
            <img src="{{ asset('images/brands/olipop.png') }}" alt="Byron Bay Logo" class="brand-logo">

            <div class="product-footer">
              <div class="product-info">
                <p>BARBIE Peaches & Cream Soda</p>
              </div>
              <a href="{{ route('barbie.show') }}" class="price-badge">P85</a>
            </div>
          </div>
        </div>

        <div class="displayed-products-below flex justify-center items-center mt-10">

          <div class="product-card">
            <div class="product-wrapper">
              <img src="{{ asset('images/product/bun.png') }}" alt="Tropical Mango & Passionfruit Cookie">
            </div>
            <img src="{{ asset('images/brands/sweetsparadise.png') }}" alt="Byron Bay Logo" class="brand-logo">

            <div class="product-footer">
              <div class="product-info">
                <p>Way of the Strong Special Mixed Yakisoba</p>
              </div>
              <a href="{{ route('bun.show') }}" class="price-badge">P145</a>
            </div>
          </div>

          <div class="product-card">
            <div class="product-wrapper">
              <img src="{{ asset('images/product/tea.png') }}" alt="Complimentary Pairs Sabrosa Original">
            </div>
            <img src="{{ asset('images/brands/teaforte.png') }}" alt="Byron Bay Logo" class="brand-logo">

            <div class="product-footer">
              <div class="product-info">
                <p>Tea Chest Jubilee Petite Pyramid </p>
              </div>
              <a href="{{ route('tea.show') }}" class="price-badge">P635</a>
            </div>
          </div>

          <div class="product-card">
            <div class="product-wrapper">
              <img src="{{ asset('images/product/smores.png') }}" alt="Tropical Mango & Passionfruit Cookie">
            </div>
            <img src="{{ asset('images/brands/chobani.png') }}" alt="Byron Bay Logo" class="brand-logo">

            <div class="product-footer">
              <div class="product-info">
                <p>Chobani Flip S'more S'mores</p>
              </div>
              <a href="{{ route('smores.show') }}" class="price-badge">P125</a>
            </div>
          </div>
        </div>

      <div class="about-image flex justify-center items-center mt-32 mb-16 gap-12 px-10" style="margin-top: 120px; margin-bottom: 70px;">
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

    <footer class="bg-cover bg-center" style="background-image: url('{{ asset('images/footer.png') }}'); background-size: cover;">
        <div class="footer-content flex px-8">
        <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="product-logo w-auto h-12 left-0">
          <ul class="socials flex space-x-4">
            <li><a href="#"><img src="{{ asset('images/facebok.png') }}" alt="Facebook Logo" class="w-8 h-auto"></a></li>
            <li><a href="#"><img src="{{ asset('images/twitter.png') }}" alt="Twitter Logo" class="w-8 h-auto"></a></li>
            <li><a href="#"><img src="{{ asset('images/insta.png') }}" alt="Google Plus Logo" class="w-8 h-auto"></a></li>
            <li><a href="#"><img src="{{ asset('images/yt.png') }}" alt="YouTube Logo" class="w-8 h-auto"></a></li>
          </ul>
        </div>
    </footer>


</body>
</html>
