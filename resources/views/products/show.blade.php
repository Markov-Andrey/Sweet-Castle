@extends('layouts.app')

@section('title', $product->title)

@section('content')

    @include('partials.header')
        <div class="mx-auto flex flex-col gap-4 lg:flex-row justify-center">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="relative">
                    <img class="p-2 rounded-t-lg w-full" src="/storage/products/{{ $product->thumbnail }}" alt="image" />
                    <span class="bg-pink-50 rounded-lg px-3 absolute bottom-[5%] right-[5%] text-3xl font-bold text-gray-900 dark:text-white">${{ $product->price }}</span>
                </div>
                <div class="px-5 pb-5">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->title }}</h5>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">{{ $product->description }}</p>
                    @livewire('add-to-cart', ['productId' => $product->id])
                </div>
            </div>
        </div>
        @livewire('comment', ['model' => $product])

@endsection
