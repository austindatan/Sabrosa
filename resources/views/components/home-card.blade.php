<a href="{{ $route }}" class="bg-white border-2 border-[#E55182] rounded-[20px] w-full max-w-[312px] h-auto sm:h-[360px] p-4 flex flex-col justify-between">
    <div class="w-full h-[180px] sm:h-[180px] overflow-hidden mt-2">
        <img src="{{ asset($image) }}" alt="{{ $name }}" class="w-full h-full object-cover object-center">
    </div>

    <img src="{{ asset($brand) }}" alt="Brand Logo" class="w-[70px] sm:w-[90px] h-auto mt-4 ml-5 invert">

    <div class="flex justify-between items-end px-1 py-2">
        <div class="text-left">
            <p class="text-black text-[1.2rem] sm:text-[1.5rem] leading-tight font-normal font-['Barlow'] m-0 px-[15px]">
                {{ $name }}
            </p>
        </div>

        <div class="bg-[#FF6C9B] text-white font-semibold text-[1rem] sm:text-[1.2rem] w-[120px] sm:w-[155px] h-[60px] sm:h-[75px] flex items-center justify-center rounded-[6px] mr-2 whitespace-nowrap">
            {{ $price }}
        </div>
    </div>
</a>
