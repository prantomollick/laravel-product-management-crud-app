@foreach ($products as $product)
<tr class="bg-white border-b hover:bg-gray-50">
    <td class="px-6 py-4 font-semibold text-gray-900">
        <span class="ml-10">{{ $product->id }}</span>
    </td>
    
    @if($product->image)
    <td class="p-4">
        <img src="{{ asset('storage/products/' . basename($product->image)) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $product->name }}">
    </td>
    @else
    <td class="p-4">
        <img src="{{ asset('storage/products/default.svg') }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $product->name }}">
    </td>
    @endif

    <td class="px-6 py-4">
        {{ $product->name }}
    </td>

    @php
        $shortDescription = Str::limit($product->description, 20, '...');
    @endphp
    <td class="px-6 py-4">
        {{ $shortDescription }}
    </td>

    <td class="px-6 py-4 font-semibold text-gray-900">
       $ {{ $product->price }}
    </td>

    <td class="px-6 py-4 font-semibold text-gray-900">
        {{ $product->stock }}
    </td>

    <td class="px-6 py-4">
        <!-- Modal toggle -->
        <a href="{{ route('products.show', $product->id) }}" type="button" class="font-medium text-blue-600">Show</a> |
        <a href="{{ route('products.edit', $product->id) }}" type="button" class="font-medium text-blue-600">Edit</a> | 
        <button class="delete-button font-medium text-red-600" data-modal-target="deleteModal" data-modal-show="deleteModal" data-id="{{ $product->id }}">Delete</button>
    </td>
</tr>
@endforeach