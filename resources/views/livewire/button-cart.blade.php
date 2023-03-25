<div>
    <!-- Header button -->
    <a href="{{ route("cart") }}">
        <button id="dropdownHoverButton"
                data-dropdown-toggle="dropdownHover"
                data-dropdown-trigger="hover"
                class="mr-2 mb-2 relative inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800">
            <svg class="w-5 h-5 mr-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"></path></svg>
            <span class="sr-only">Notifications</span>
            @if($totalItems)
                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                    {{ $totalItems }}
                </div>
            @endif
        </button>
    </a>

    <!-- Content -->
    <div id="dropdownHover" class="rounded-full z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        @if($totalItems)
            <table class="absolute -top-2 -right-5 bg-white w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        @foreach(['Photo','Name','Price','Quantity','Subtotal',] as $name)
                            @if($loop->odd)
                                <th scope="col" class="px-6 py-3 bg-pink-50 dark:bg-gray-800">
                                    {{$name}}
                                </th>
                            @else
                                <th scope="col" class="px-6 py-3">
                                    {{$name}}
                                </th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($itemsCollection as $item)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 bg-pink-50">
                                <img class="rounded-full border border-gray-100 shadow-sm w-10" src="/storage/products/{{ $item->product->thumbnail }}" alt="{{ $item->product->title }}">
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->product->title }}
                            </td>
                            <td class="px-6 py-4 bg-pink-50">
                                {{ $item->product->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-6 py-4 bg-pink-50">
                                {{ number_format($item->product->price * $item->quantity, 2) }}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="bg-pink-200">
                        <td class="px-6 py-4 text-xs font-bold text-gray-700 uppercase dark:text-gray-400">Total</td>
                        <td></td>
                        <td></td>
                        <td class="px-6 py-4">{{ $totalItems }}</td>
                        <td class="px-6 py-4">${{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
</div>
