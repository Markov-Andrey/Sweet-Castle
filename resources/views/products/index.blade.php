@extends('layouts.app')

@section('title', 'All goodies')

@section('content')

    @include('partials.header')

    <div class="flex justify-center flex-row flex-wrap gap-2 mx-5">
        @each('products.partials.item', $products, 'product', 'products.partials.no-item')
    </div>

    <div class="flex justify-center py-10">
        {{ $products->links() }}
    </div>

@endsection
