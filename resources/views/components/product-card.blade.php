<div class="bg-[white] border-2 border-[#E55182] rounded-[20px] w-[312px] h-[360px] p-[10px] flex flex-col justify-between">
    <div class="w-full h-[180px] overflow-hidden mt-[10px]">
        <img src="{{ asset($image) }}" alt="{{ $name }}" class="w-full h-full object-cover object-center">
    </div>
    <img src="{{ asset($brand) }}" alt="Brand Logo" class="w-[90px] h-auto mt-[15px] ml-[20px] invert">
    <div class="flex justify-between items-end px-[5px] py-[10px]">
        <div class="text-left">
            <p class="text-black text-[1.5rem] leading-[1.1] font-normal font-['Barlow'] m-[2px_0_0_0] px-[15px]">
                {{ $name }}
            </p>
        </div>
        <a href="{{ $route }}" class="bg-[#FF6C9B] text-white font-semibold text-[1.2rem] w-[155px] h-[75px] flex items-center justify-center rounded-[6px] mr-[10px] whitespace-nowrap">
            {{ $price }}
        </a>
    </div>
</div>
