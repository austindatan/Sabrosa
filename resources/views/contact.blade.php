<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Contact + FAQs</title>
  @include('pages.head')
</head>

<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-grow">
    <div class="header-image w-full mt-[80px]">
      <img src="{{ asset('images/contact_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <div class="relative overflow-hidden max-w-[2220px] mx-auto pt-12 sm:pt-16 md:pt-[100px] px-4 sm:px-6 md:px-12 lg:px-[80px] pb-0 mb-[100px]">
      <div class="about-image flex flex-col items-center gap-3 text-center px-4 w-full">
        <div class="w-full max-w-3xl mx-auto">

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
            Contact Us
          </h4>

          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify space-y-4 gap-12 mb-12">
            Email us about orders: info@sabrosaPH.com<br>
            Email us about donations: donations@sabrosaPH.com<br>
            Email us with press inquiries: press@sabrosaPH.com<br>
            Email us about jobs: jobs@sabrosaPH.com<br>
            Email us about shipping: shipping@sabrosaPH.com<br>
            Email us about wholesale: wholesale@sabrosaPH.com
          </p>

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
          Do you ship products?
          </h4>

          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify space-y-4 gap-12 mb-12">
          YES! We ship all of our products nationwide all year. For more information on our Nationwide Shipping Program, click here!
          </p>

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
          Do you have a menu?
          </h4>

          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify space-y-4 gap-12 mb-12">
          Absolutely! Here is a menu for our regular products and please check out our Facebook or Instagram pages for our special seasonal products. You might even catch a promotion or two!
          </p>

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
          Where is my order?
          </h4>

          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify space-y-4 gap-12 mb-12">
          Once you place an order on Sabrosa, our team at the nearest depot gets to work preparing and packing your items right away. We always aim to deliver your snacks as quickly as possible. However, delays can sometimes happen due to traffic or a high volume of orders. We appreciate your patience!
If it’s taking longer than expected, feel free to contact us. We’ll check on your order and update you immediately.          </p>

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
          What are the delivery costs?
          </h4>

          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify space-y-4 gap-12">
          At Sabrosa, delivery fees depend on your location and how far it is from us. The closer you are, the lower the delivery cost and sometimes it's even free! If you're a bit farther out, there may be a small additional fee to cover the distance. You can always see the exact delivery cost at checkout before placing your order.          </p>
        </div>
      </div>
    </div>

  </main>

  @include('pages.footer')

</body>
</html>
