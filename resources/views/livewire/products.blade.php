<div x-data="{}">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Products</h3>

        <div class="mt-8">
            <a wire:click="add" class="text-indigo-600 hover:text-indigo-900">Add product</a>
        </div>

        <div wire:target="store" wire:loading.class="opacity-50" class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Icon</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Price</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($products as $item)

                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <img class="rounded-full border border-gray-100 shadow-sm" width="75" src="/storage/products/{{ $item->thumbnail }}" alt="ico">
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $item->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $item->price }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a wire:click="update({{ $item }})" class="text-indigo-600 hover:text-indigo-900">Update</a>
                                    <a @click="$wire.delete({{ $item }})" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            {{ $products->links() }}
        </div>
    </div>

    @if($popUp)
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div @click.away="$wire.close()" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                        {{ $product->exists ? 'Update product' : 'Add product' }}
                                    </h3>
                                </div>
                            </div>
                        </div>


                        <form wire:submit.prevent="store" class="space-y-5 p-5">
                            <input wire:model.defer="product.title" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('product.title') border-red-500 @enderror" placeholder="Title" value="{{ isset($product) ? $product->title : ''}}" />

                            @error('product.title')
                                @include('partials.error')
                            @enderror

                            <input wire:model.defer="product.description" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('product.description') border-red-500 @enderror" placeholder="Description" value="{{ isset($product) ? $product->description : '' }}" />

                            @error('product.description')
                                @include('partials.error')
                            @enderror

                            <input wire:model.defer="product.price" type="number" step="0.01" class="w-full h-12 border border-gray-800 rounded px-3 @error('product.price') border-red-500 @enderror" placeholder="Price" value="{{ isset($product) ? $product->price : '' }}" />

                            @error('product.price')
                                @include('partials.error')
                            @enderror

                            @if(isset($product->thumbnail))
                                <div>
                                    <img width="400" src="/storage/products/{{ $product->thumbnail }}">
                                </div>
                            @endif

                            <input wire:model.defer="photo" type="file" class="w-full h-12" @error('photo') border-red-500 @enderror placeholder="Image" >

                            @error('photo')
                                @include('partials.error')
                            @enderror

                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                    Save
                                </button>
                                <button wire:click="close" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
