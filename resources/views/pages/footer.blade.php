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

<footer class="w-full bg-pink-100 shadow-t-lg">
        <div class="mx-auto max-w-7xl px-6 lg:px-8"> 
            <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-4 lg:gap-8 py-14 max-w-xs mx-auto sm:max-w-2xl md:max-w-3xl lg:max-w-full">
                <div class="col-span-full mb-10 lg:col-span-2 lg:mb-0">
                    <div class="flex items-center space-x-1">
                        <a href="https:">
                            <img src="{{ asset('images/sabrosa_stable_logo.png') }}" alt="Stable Logo" class="w-auto h-12 mb-1">
                        </a>

                        <a href="https:">
                            <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-auto h-12 mb-1">
                        </a>
                    </div>

                    <p class="py-8 text-sm text-gray-500 lg:max-w-xs text-center lg:text-left">A flavor that will make you feel nostalgia and home.</p>
                    <div class="flex mt-4 space-x-4 justify-center lg:justify-start sm:mt-0 ">
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-[#1f27a6] flex justify-center items-center hover:bg-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 24 24">
                                <path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.97 3.61 9.17 8.38 9.92v-7.05h-2.53v-2.87h2.53v-2.14c0-2.47 1.46-3.83 3.7-3.83 1.07 0 2.18.08 2.46.12v2.55h-1.39c-1.09 0-1.38.52-1.38 1.31v1.73h2.76l-.36 2.87h-2.4v7.05c4.76-.75 8.38-4.95 8.38-9.92 0-5.5-4.46-9.96-9.96-9.96z"/>
                            </svg>  
                        </a>
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-[#1f27a6] flex justify-center items-center hover:bg-indigo-600">
                                <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                  <g id="Social Media">
                                  <path id="Vector" d="M11.3214 8.93654L16.4919 3.05554H15.2667L10.7772 8.16193L7.1914 3.05554H3.05566L8.47803 10.7773L3.05566 16.9444H4.28097L9.022 11.5519L12.8088 16.9444H16.9446L11.3211 8.93654H11.3214ZM9.64322 10.8453L9.09382 10.0764L4.72246 3.95809H6.60445L10.1322 8.89578L10.6816 9.66469L15.2672 16.0829H13.3852L9.64322 10.8456V10.8453Z" fill="currentColor"/>
                                  </g>
                                </svg>
                                
                        </a>
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-[#1f27a6] flex justify-center items-center hover:bg-indigo-600">
                            <svg class="w-[1.25rem] h-[1.125rem] text-white" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.70975 7.93663C4.70975 6.65824 5.76102 5.62163 7.0582 5.62163C8.35537 5.62163 9.40721 6.65824 9.40721 7.93663C9.40721 9.21502 8.35537 10.2516 7.0582 10.2516C5.76102 10.2516 4.70975 9.21502 4.70975 7.93663ZM3.43991 7.93663C3.43991 9.90608 5.05982 11.5025 7.0582 11.5025C9.05658 11.5025 10.6765 9.90608 10.6765 7.93663C10.6765 5.96719 9.05658 4.37074 7.0582 4.37074C5.05982 4.37074 3.43991 5.96719 3.43991 7.93663ZM9.97414 4.22935C9.97408 4.39417 10.0236 4.55531 10.1165 4.69239C10.2093 4.82946 10.3413 4.93633 10.4958 4.99946C10.6503 5.06259 10.8203 5.07916 10.9844 5.04707C11.1484 5.01498 11.2991 4.93568 11.4174 4.81918C11.5357 4.70268 11.6163 4.55423 11.649 4.39259C11.6817 4.23095 11.665 4.06339 11.6011 3.91109C11.5371 3.7588 11.4288 3.6286 11.2898 3.53698C11.1508 3.44536 10.9873 3.39642 10.8201 3.39635H10.8197C10.5955 3.39646 10.3806 3.48424 10.222 3.64043C10.0635 3.79661 9.97434 4.00843 9.97414 4.22935ZM4.21142 13.5892C3.52442 13.5584 3.15101 13.4456 2.90286 13.3504C2.57387 13.2241 2.33914 13.0738 2.09235 12.8309C1.84555 12.588 1.69278 12.3569 1.56527 12.0327C1.46854 11.7882 1.3541 11.4201 1.32287 10.7431C1.28871 10.0111 1.28189 9.79119 1.28189 7.93669C1.28189 6.08219 1.28927 5.86291 1.32287 5.1303C1.35416 4.45324 1.46944 4.08585 1.56527 3.84069C1.69335 3.51647 1.84589 3.28513 2.09235 3.04191C2.3388 2.79869 2.57331 2.64813 2.90286 2.52247C3.1509 2.42713 3.52442 2.31435 4.21142 2.28358C4.95417 2.24991 5.17729 2.24319 7.0582 2.24319C8.9391 2.24319 9.16244 2.25047 9.90582 2.28358C10.5928 2.31441 10.9656 2.42802 11.2144 2.52247C11.5434 2.64813 11.7781 2.79902 12.0249 3.04191C12.2717 3.2848 12.4239 3.51647 12.552 3.84069C12.6487 4.08513 12.7631 4.45324 12.7944 5.1303C12.8285 5.86291 12.8354 6.08219 12.8354 7.93669C12.8354 9.79119 12.8285 10.0105 12.7944 10.7431C12.7631 11.4201 12.6481 11.7881 12.552 12.0327C12.4239 12.3569 12.2714 12.5882 12.0249 12.8309C11.7784 13.0736 11.5434 13.2241 11.2144 13.3504C10.9663 13.4457 10.5928 13.5585 9.90582 13.5892C9.16306 13.6229 8.93994 13.6296 7.0582 13.6296C5.17645 13.6296 4.95395 13.6229 4.21142 13.5892ZM4.15307 1.03424C3.40294 1.06791 2.89035 1.18513 2.4427 1.3568C1.9791 1.53408 1.58663 1.77191 1.19446 2.1578C0.802277 2.54369 0.56157 2.93108 0.381687 3.38797C0.207498 3.82941 0.0885535 4.3343 0.0543922 5.07358C0.0196672 5.81402 0.0117188 6.05074 0.0117188 7.93663C0.0117188 9.82252 0.0196672 10.0592 0.0543922 10.7997C0.0885535 11.539 0.207498 12.0439 0.381687 12.4853C0.56157 12.9419 0.802334 13.3297 1.19446 13.7155C1.58658 14.1012 1.9791 14.3387 2.4427 14.5165C2.89119 14.6881 3.40294 14.8054 4.15307 14.839C4.90479 14.8727 5.1446 14.8811 7.0582 14.8811C8.9718 14.8811 9.212 14.8732 9.96332 14.839C10.7135 14.8054 11.2258 14.6881 11.6737 14.5165C12.137 14.3387 12.5298 14.1014 12.9219 13.7155C13.3141 13.3296 13.5543 12.9419 13.7347 12.4853C13.9089 12.0439 14.0284 11.539 14.062 10.7997C14.0962 10.0587 14.1041 9.82252 14.1041 7.93663C14.1041 6.05074 14.0962 5.81402 14.062 5.07358C14.0278 4.33424 13.9089 3.82913 13.7347 3.38797C13.5543 2.93135 13.3135 2.5443 12.9219 2.1578C12.5304 1.7713 12.137 1.53408 11.6743 1.3568C11.2258 1.18513 10.7135 1.06735 9.96388 1.03424C9.21256 1.00058 8.97236 0.992188 7.05876 0.992188C5.14516 0.992188 4.90479 1.00002 4.15307 1.03424Z" fill="currentColor"/>
                                </svg>
                                
                        </a>
                        <a href="javascript:;"  class="w-9 h-9 rounded-full bg-[#1f27a6] flex justify-center items-center hover:bg-indigo-600">
                            <svg class="w-[1.25rem] h-[0.875rem] text-white" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9346 1.13529C14.5684 1.30645 15.0665 1.80588 15.2349 2.43896C15.5413 3.58788 15.5413 5.98654 15.5413 5.98654C15.5413 5.98654 15.5413 8.3852 15.2349 9.53412C15.0642 10.1695 14.5661 10.669 13.9346 10.8378C12.7886 11.1449 8.19058 11.1449 8.19058 11.1449C8.19058 11.1449 3.59491 11.1449 2.44657 10.8378C1.81277 10.6666 1.31461 10.1672 1.14622 9.53412C0.839844 8.3852 0.839844 5.98654 0.839844 5.98654C0.839844 5.98654 0.839844 3.58788 1.14622 2.43896C1.31695 1.80353 1.81511 1.30411 2.44657 1.13529C3.59491 0.828125 8.19058 0.828125 8.19058 0.828125C8.19058 0.828125 12.7886 0.828125 13.9346 1.13529ZM10.541 5.98654L6.72178 8.19762V3.77545L10.541 5.98654Z" fill="currentColor"/>
                                </svg>
                                
                        </a>
                    </div>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-center sm:text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Pagedone</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href="javascript:;"  class="text-gray-600 hover:text-gray-900">Home</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">About</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Pricing</a></li>
                        <li><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Features</a></li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-center sm:text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Products</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href="javascript:;"  class="text-gray-600 hover:text-gray-900">Figma UI System</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Icons Assets</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Responsive Blocks</a></li>
                        <li><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Components Library</a></li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-center sm:text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Resources</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href="javascript:;"  class="text-gray-600 hover:text-gray-900">FAQs</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Quick Start</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Documentation</a></li>
                        <li><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">User Guide</a></li>
                    </ul>
                </div>
                <!--End Col-->
                <div class="lg:mx-auto text-center sm:text-left">
                    <h4 class="text-lg text-gray-900 font-medium mb-7">Blogs</h4>
                    <ul class="text-sm  transition-all duration-500">
                        <li class="mb-6"><a href="javascript:;"  class="text-gray-600 hover:text-gray-900">News</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Tips & Tricks</a></li>
                        <li class="mb-6"><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">New Updates</a></li>
                        <li><a href="javascript:;"  class=" text-gray-600 hover:text-gray-900">Events</a></li>
                    </ul>
                </div>
            </div>
            <!--Grid-->
            <div class="py-7 border-t border-gray-200">
                <div class="flex items-center justify-center flex-col lg:justify-between lg:flex-row">
                    <span class="text-sm text-gray-500 ">©<a href="https://pagedone.io/">pagedone</a>2024, All rights reserved.</span>
                    <ul class="flex items-center gap-9 mt-4 lg:mt-0">
                        <li><a href="javascript:;"  class="text-sm text-gray-500">Terms</a></li>
                        <li><a href="javascript:;"  class="text-sm text-gray-500">Privacy</a></li>
                        <li><a href="javascript:;"  class="text-sm text-gray-500">Cookies</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>