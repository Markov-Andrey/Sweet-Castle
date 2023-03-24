@extends('layouts.app')


@section('title', 'Sweet Castle')

@section('content')

    @include('partials.header')
    <div class="flex flex-auto justify-center px-[25%]">
        <img class="h-56 rounded-full" src="images/362d155de874de34bce4ee36500ffb4c.jpg" alt="">
        <p class="sweet-font text-2xl p-10">
            Welcome to our enchanting kingdom,
            where the delicious treats we serve are fit for royalty!
            <!--
            Welcome to our enchanting kingdom,
            where the delicious treats we serve are fit for royalty!
            Indulge in the sweetest and most scrumptious treats,
            handcrafted with love and care by our skilled pastry chefs.
            Our kingdom is a wonderland of flavor and delight,
            where every bite is a magical experience. Whether you're in the mood for
            something classic or feeling adventurous, our kingdom has something to satisfy
            every sweet tooth. So come and join us in our fairytale land and indulge in the best
            yummy in the whole world!
            -->
        </p>
    </div>

@endsection
