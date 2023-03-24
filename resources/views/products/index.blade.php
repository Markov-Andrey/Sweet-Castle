@extends('layouts.app')

@section('title', 'All goodies')

@section('content')

    @include('partials.header')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @each('products.partials.item', $products, 'product', 'products.partials.no-item')

    </div>
    <div>
        {{ $products->links() }}
    </div>

@endsection
