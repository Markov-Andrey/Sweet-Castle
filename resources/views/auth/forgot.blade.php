@extends('layouts.app')

@section('title', 'Password recovery')

@section('content')
    <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-pink-300 to-pink-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <h1 class="text-center text-5xl font-semibold sweet-font text-pink-600">
                    Password recovery
                </h1>

                <form class="space-y-5 mt-5" method="POST" action="forgot_process">
                    @csrf
                    <div class="relative">
                        <input autocomplete="off" id="email" name="email" type="text" class="hover:bg-pink-100 rounded-lg peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 @error('email') border-red-500 @enderror" placeholder="Email" />
                        <label for="email" class="absolute left-3 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">
                            Email
                        </label>
                    </div>

                    @error('email')
                        @include('partials.error', ['message' => $message])
                    @enderror

                    <div>
                        <a href="{{ route("login") }}" class="font-medium text-rose-900 hover:bg-pink-100 rounded-md p-2">Remembered the password</a>
                    </div>

                    <button type="submit" class="text-center w-full rounded-md text-white py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium">Recover</button>
                </form>
            </div>
        </div>
    </div>
@endsection
