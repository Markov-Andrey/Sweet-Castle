<div class="px-4 py-8 max-w-xl">
    <div class="bg-white shadow-2x1">
        <a href="{{ route("products.show", $product->id) }}">
            <img src="/storage/products/{{ $product->thumbnail }}">
        </a>
    </div>
    <div class="px-4 py-2 mt-2 bg-white">
        <h1 class="font-bold text-2x1 text-gray-800">{{ $product->title }}</h1>
        <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">{{ $product->description }}</p>
    </div>
</div>
