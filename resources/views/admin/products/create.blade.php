@extends('layouts.admin')

@section('title', isset($product) ? 'Update product' : 'Add product')

@section('content')
    <div>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div class="flex-1 flex flex-col overflow-hidden">
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($product) ? 'Update product '.$product->title : 'Add product' }}</h3>

                        <div class="mt-8">

                        </div>

                        <div class="mt-8">
                            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($product) ? route("admin.products.update", $product->id) : route("admin.products.store") }}">
                                @csrf

                                @if(isset($product))
                                    @method('PUT')
                                @endif

                                <input name="title" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror" placeholder="Title" value="{{ isset($product) ? $product->title : '' }}" />

                                @error('title')
                                    @include('partials.error')
                                @enderror

                                <input name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('description') border-red-500 @enderror" placeholder="Description" value="{{ isset($product) ? $product->description : '' }}" />

                                @error('description')
                                    @include('partials.error')
                                @enderror

                                <input name="price" type="number" step="0.01" class="w-full h-12 border border-gray-800 rounded px-3 @error('price') border-red-500 @enderror" placeholder="Price" value="{{ isset($product) ? $product->price : '' }}" />

                                @error('price')
                                    @include('partials.error')
                                @enderror

                                @if(isset($product))
                                    <div>
                                        <img width="400" src="/storage/products/{{ $product->thumbnail }}">
                                    </div>
                                @endif

                                <input name="thumbnail" type="file" class="w-full h-12" placeholder="Обложка" />

                                @error('thumbnail')
                                    @include('partials.error')
                                @enderror

                                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
                            </form>

                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

@endsection
