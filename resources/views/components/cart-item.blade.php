<div class="px-4 sm:px-0">
  <div class="grid grid-cols-1 sm:grid-cols-12 items-center py-6 border-t border-gray-300 gap-y-4 sm:gap-x-12">

    <div class="col-span-1 sm:col-span-6 w-full flex flex-row items-center gap-4 sm:gap-6">
    <img src="{{ asset($image) }}" class="bg-white w-28 h-28 object-contain p-1 rounded-lg border mx-auto sm:mx-0" />
      <div class="w-full sm:max-w-[300px]">
        <p class="text-lg sm:text-xl font-dm-sans text-gray-800">
          {{ $name }}
        </p>
        <p class="text-gray-500 mt-1 font-poppins">{{ $priceText }}</p>
      </div>
    </div>

    <div class="flex sm:hidden justify-between items-center w-full mt-2">
      <div class="flex items-center gap-2 flex-wrap">
        <button class="px-3 py-1.5 border border-gray-400 text-base font-bold">−</button>
        <span class="text-lg">{{ $quantity }}</span>
        <button class="px-3 py-1.5 border border-gray-400 text-base font-bold">+</button>
        <button class="text-red-500 text-xl" title="Remove">🗑️</button>
      </div>
      <div class="font-semibold text-lg text-right font-poppins">{{ $total }}</div>
    </div>

    <div class="hidden sm:flex sm:col-span-3 justify-center items-center gap-2 sm:gap-3 flex-wrap">
      <button class="px-3 py-1.5 border border-gray-400 text-base font-bold">−</button>
      <span class="text-lg font-dm-sans">{{ $quantity }}</span>
      <button class="px-3 py-1.5 border border-gray-400 text-base font-bold">+</button>
      <button class="text-red-500 text-xl" title="Remove">🗑️</button>
    </div>

    <div class="hidden sm:block sm:col-span-3 text-right font-semibold text-lg sm:text-xl font-dm-sans">
      {{ $total }}
    </div>

  </div>
</div>
