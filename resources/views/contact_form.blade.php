@extends('layouts.app')

@section('title', 'Contact us')

@section('content')
    @include('partials.header')
    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-pink-300 to-pink-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <h1 class="text-center text-5xl font-semibold sweet-font text-pink-600">
                    Contact us
                </h1>

            <form action="{{ route("contact_form_process") }}" method="POST" class="space-y-5 mt-5">
                @csrf

                <div class="relative">
                    <input autocomplete="off" id="email" name="email" type="text" class="hover:bg-pink-100 rounded-lg peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 @error('email') border-red-500 @enderror" placeholder="Email" />
                    <label for="email" class="absolute left-3 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">
                        Email
                    </label>
                </div>

                @error('email')
                    @include('partials.error')
                @enderror

                <div class="relative">
                    <textarea class="h-56 hover:bg-pink-100 rounded-lg peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 @error('text') border-red-500 @enderror" name="text" id="text" cols="30" rows="10"></textarea>
                    <label for="text" class="absolute left-3 -top-1 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">
                        Message
                    </label>
                </div>

                @error('text')
                    @include('partials.error')
                @enderror

                <button type="submit" class="text-center w-full rounded-md text-white py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium">Send</button>
            </form>
        </div>
    </div>
@endsection
