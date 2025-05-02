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