@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    @include('partials.header')

    @livewire('cart')

@endsection
