<tr class="bg-white border-b border-pink-200 hover:bg-pink-50">
  <td class="px-4 py-4 truncate text-pink-900 flex items-center gap-2">
    <img src="{{ asset('images/product/product_sprites/' . $image) }}" class="bg-white w-8 h-8 object-contain rounded border" />
    {{ $name }}
        </td>
        <td class="px-4 py-4 truncate">{{ $category }}</td>
        <td class="px-4 py-4 truncate">{{ $brand }}</td>
        <td class="px-4 py-4 truncate">{{ $description }}</td>
        <td class="px-4 py-4 truncate">{{ $price }}</td>
        <td class="px-4 py-4 truncate">{{ $stock }}</td>
        <td class="px-4 py-4 truncate">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
    </svg>
  </td>
</tr>
