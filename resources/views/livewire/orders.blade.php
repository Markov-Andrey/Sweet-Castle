<div x-data="{open: false}">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Orders</h3>

        <div id="accordion-arrow-icon" data-accordion="close">
            @foreach($groupOrders as $orderNum => $orderProducts)

            <h2 id="accordion-arrow-icon-heading-{{ $loop->iteration }}">
                <button type="button" class="flex gap-x-4 items-center justify-between w-full p-5 font-medium text-left text-gray-900 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white dark:bg-gray-800 focus:ring-gray-200
                @switch($orderProducts->first()->status)
                    @case(1)
                        bg-red-400
                        hover:bg-red-500
                        active:bg-red-600
                    @break
                    @case(2)
                        bg-orange-300
                        hover:bg-orange-400
                        active:bg-orange-500
                    @break
                    @case(3)
                        bg-yellow-100
                        hover:bg-yellow-200
                        active:bg-yellow-300
                    @break
                    @case(4)
                        bg-blue-200
                        hover:bg-blue-300
                        active:bg-blue-400
                    @break
                    @case(5)
                        bg-green-400
                        hover:bg-green-500
                        active:bg-green-600
                    @break
                    @case(6)
                        bg-gray-300
                        hover:bg-gray-400
                        active:bg-gray-500
                    @break
                    @case(7)
                        bg-gray-300
                        hover:bg-gray-400
                        active:bg-gray-500
                    @break
                @endswitch
                    " data-accordion-target="#accordion-arrow-icon-body-{{ $loop->iteration}}" aria-expanded="true" aria-controls="accordion-arrow-icon-body-{{ $loop->iteration}}" @click="open = !open">
                    <div class="flex gap-x-4 flex-col text-center">
                        <span>№</span>
                        <span>{{ $orderNum }}</span>
                    </div>
                    <div class="flex flex-col text-center">
                        <span>User</span>
                        <span>{{ $orderProducts->first()->user_name }}</span>
                    </div>
                    <div class="flex flex-col text-center">
                        <span>Contact</span>
                        <span>{{ $orderProducts->first()->user_email }}</span>
                    </div>
                    <div class="flex flex-col text-center">
                        <span>Status</span>
                        <span>{{ $orderProducts->first()->status_name }}</span>
                    </div>
                    <div class="flex flex-col text-center">
                        <span>Created at</span>
                        <span>{{ $orderProducts->first()->created_at }}</span>
                    </div>
                    <div class="flex flex-col text-center">
                        <span>Updated at</span>
                        <span>{{ $orderProducts->first()->updated_at }}</span>
                    </div>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
                </button>
            </h2>

            <div id="accordion-arrow-icon-body-{{ $loop->iteration }}" aria-labelledby="accordion-arrow-icon-heading-{{ $loop->iteration }}">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Product
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Subtotal
                        </th>
                    </tr>
                    </thead>
                @foreach($orderProducts as $order)
                    <tbody class="bg-white">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $order->product_title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $order->quantity }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $order->product_price }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ number_format($order->product_price * $order->quantity, 2) }}</div>
                            </td>
                        </tr>
                    </tbody>

                @endforeach
                    <tfoot class="bg-white">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <select wire:model="selectedOption.{{ $orderNum }}" wire:change="sendStatus({{ $orderProducts }})" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($statuses as $status)
                                        <option
                                            @if($status->id == $orderProducts->first()->status)
                                                selected
                                            @endif
                                            value="{{ $status->id }}">
                                            {{ $status->status_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                            </td>
                            <td class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                TOTAL:
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                ${{ number_format($totals[$orderNum], 2) }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @endforeach
        </div>

    </div>
</div>
