<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a class="relative" href="{{ route("products.show", $product->id) }}">
        <img class="p-2 rounded-t-lg w-full h-[75%]" src="/storage/products/{{ $product->thumbnail }}" alt="image" />
        <span class="bg-pink-50 rounded-lg px-3 absolute bottom-[5%] right-[5%] text-3xl font-bold text-gray-900 dark:text-white">${{ $product->price }}</span>
    </a>
    <div class="px-5 pb-5">
        <a href="{{ route("products.show", $product->id) }}">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->title }}</h5>
        </a>
        <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">{{ $product->description }}</p>
        @livewire('add-to-cart', ['productId' => $product->id])
    </div>
</div>
