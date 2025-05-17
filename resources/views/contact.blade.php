<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Contact + FAQs</title>
  @include('pages.head')
  <!-- EmailJS SDK -->
  <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script>
    (function(){
      emailjs.init("PzAxkgiZTVUN2_BGV"); 
    })();
  </script>
</head>

<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-grow">
    {{-- Banner --}}
    <div class="header-image w-full mt-[80px]">
      <img src="{{ asset('images/contact_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <div class="relative overflow-hidden max-w-[2220px] mx-auto pt-12 sm:pt-16 md:pt-[100px] px-4 sm:px-6 md:px-12 lg:px-[80px] pb-0 mb-[100px]">

      {{-- Contact Form --}}
      <div class="w-full max-w-3xl mx-auto mb-16 bg-white p-8 rounded-2xl shadow-lg">
        <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-6 font-[Poppins] text-left">
          Send Us a Message
        </h4>
        <form id="contactForm" class="space-y-4 text-left">
          <div>
            <label class="block mb-1 font-medium">Your Name</label>
            <input type="text" name="from_name" required
              class="w-full border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
          </div>
          <div>
            <label class="block mb-1 font-medium">Your Email</label>
            <input type="email" name="reply_to" required
              class="w-full border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
          </div>
          <div>
            <label class="block mb-1 font-medium">Message</label>
            <textarea name="message" rows="5" required
              class="w-full border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400 resize-none"></textarea>
          </div>
          <button type="submit"
            class="w-full bg-[#E55182] hover:bg-pink-600 text-white font-semibold rounded-lg px-4 py-3">
            Send Message
          </button>
        </form>
      </div>

      {{-- FAQs & Static Contact Info --}}
      <div class="about-image flex flex-col items-center gap-3 text-center px-4 w-full">
        <div class="w-full max-w-3xl mx-auto">

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
            Contact Us
          </h4>
          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify mb-12">
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
          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify mb-12">
            YES! We ship all of our products nationwide all year. For more information on our Nationwide Shipping Program, click here!
          </p>

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
            Do you have a menu?
          </h4>
          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify mb-12">
            Absolutely! Here is a menu for our regular products and please check out our Facebook or Instagram pages for our special seasonal products. You might even catch a promotion or two!
          </p>

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
            Where is my order?
          </h4>
          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify mb-12">
            Once you place an order on Sabrosa, our team at the nearest depot gets to work preparing and packing your items right away. 
            We always aim to deliver your snacks as quickly as possible. However, delays can sometimes happen due to traffic or a high volume of orders. We appreciate your patience!
            If it’s taking longer than expected, feel free to contact us. We’ll check on your order and update you immediately.
          </p>

          <h4 class="text-2xl md:text-3xl font-semibold text-[#1F27A6] mb-3 font-[Poppins] text-left capitalize">
            What are the delivery costs?
          </h4>
          <p class="text-black text-base md:text-lg font-dm-sans leading-relaxed text-justify">
            At Sabrosa, delivery fees depend on your location and how far it is from us. The closer you are, the lower the delivery cost and sometimes it's even free! 
            If you're a bit farther out, there may be a small additional fee to cover the distance. You can always see the exact delivery cost at checkout before placing your order.
          </p>

        </div>
      </div>
    </div>
  </main>

  @include('pages.footer')

  {{-- EmailJS Form Handler --}}
  <script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
      e.preventDefault();
      emailjs.sendForm('service_015ryiq', 'template_c6sb01r', this)
        .then(() => {
          alert('Message sent successfully!');
          this.reset();
        })
        .catch(err => {
          console.error('EmailJS Error:', err);
          alert('Failed to send message. Please try again later.');
        });
    });
  </script>
</body>
</html>
