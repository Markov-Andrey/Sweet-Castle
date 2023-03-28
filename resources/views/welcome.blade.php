@extends('layouts.app')


@section('title', 'Sweet Castle')

@section('content')

    @include('partials.header')

    @foreach([
        'Welcome to our enchanting kingdom, where the delicious treats we serve are fit for royalty!'
            => '362d155de874de34bce4ee36500ffb4c.jpg',
        'Indulge in the sweetest and most scrumptious treats, handcrafted with love and care by our skilled pastry chefs.'
            => 'ngudqlxrsbs81.png',
        'Our kingdom is a wonderland of flavor and delight, where every bite is a magical experience.'
            => '235464354352.jpg',
        'Whether you\'re in the mood for something classic or feeling adventurous, our kingdom has something to satisfy every sweet tooth.'
            => '54585f28128663.5637011d4f99e.jpg',
        'So come and join us in our fairytale land and indulge in the best yummy in the whole world!'
            => '45354354364574353253.jpg',
    ] as $str => $image)
        <div class="flex flex-auto justify-center px-[2%] items-center sm:px-[13%]">
            @if($loop->odd)
                <img class="rounded-full shadow-2xl h-36 sm:h-56" src="images/{{ $image }}" alt="image{{ $loop->iteration }}">
                <p class="sweet-font text-xl sm:text-2xl m-5 p-5 bg-white bg-opacity-75 rounded-lg shadow-2xl">{{ $str }}</p>
            @else
                <p class="sweet-font text-xl sm:text-2xl m-5 p-5 bg-white bg-opacity-75 rounded-lg shadow-2xl">{{ $str }}</p>
                <img class="rounded-full shadow-2xl h-36 sm:h-56" src="images/{{ $image }}" alt="image{{ $loop->iteration }}">
            @endif
        </div>
    @endforeach

@endsection
