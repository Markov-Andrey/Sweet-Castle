<div x-data="{}">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Orders</h3>

        <div id="accordion-arrow-icon" data-accordion="close">
            @foreach($orders->groupBy('order') as $orderNum => $orderProducts)

            <h2 id="accordion-arrow-icon-heading-{{ $loop->iteration }}">
                <button type="button" class="flex gap-x-4 items-center justify-between w-full p-5 font-medium text-left text-gray-900 bg-yellow-100 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-white dark:bg-gray-800 active:bg-yellow-300 hover:bg-yellow-200 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-{{ $loop->iteration}}" aria-expanded="true" aria-controls="accordion-arrow-icon-body-{{ $loop->iteration}}">
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

            <div id="accordion-arrow-icon-body-{{ $loop->iteration}}" aria-labelledby="accordion-arrow-icon-heading-1">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Product
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
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
                        </tr>
                    </tbody>

                @endforeach
                    <tfoot>
                        <tr>
                            <td>
                                <select wire:model="currentStatus" wire:change="sendStatus({{ $orderProducts }})" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        </tr>
                    </tfoot>
                </table>
            </div>
            @endforeach
        </div>

    </div>
</div>
