@extends('layouts.app')

@section('title', $product->title)

@section('content')

    @include('partials.header')


    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        <div class="px-4 py-8 max-w-xl">
            <div class="bg-white shadow-2xl" >
                <div>
                    <img src="/storage/products/{{ $product->thumbnail }}">
                </div>
                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="font-bold text-2xl text-gray-800">{{ $product->title }}</h2>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        {{ $product->description }}
                    </p>
                </div>
            </div>

@endsection
