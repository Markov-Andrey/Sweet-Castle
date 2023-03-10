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
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        <section class="rounded-b-lg mt-4">
            @auth("web")
                <form method="POST" action="{{ route('comment', ['id' => $product->id]) }}">
                    @csrf
                    <textarea name="text" class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl @error('text') border-red-500 @enderror" placeholder="Your feedback..." spellcheck="false"></textarea>

                    @error('text')
                        @include('partials.error', ['message' => $message])
                    @enderror

                    <button type="submit" class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">Send</button>
                </form>
            @endauth

            <div id="task-comments" class="pt-4">
                @foreach($product->comments as $comment)
                    <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                        <div class="flex flex-row justify-center mr-2">
                            <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{ $comment->user->name }}</h3>
                        </div>
                        <p style="width: 90%" class="text-gray-600 text-lg text-center md:text-left ">{{ $comment->text }}</p>
                    </div>
                @endforeach
            </div>
        </section>

    </div>

@endsection
