@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <form action="{{ route("login_process") }}" method="POST">
        @csrf

        <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-pink-300 to-pink-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="max-w-md mx-auto">
                        <h1 class="text-center text-5xl font-semibold sweet-font text-pink-600">Login Form</h1>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input autocomplete="off" id="email" name="email" type="text" class="hover:bg-pink-100 rounded-lg peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 @error('email') border-red-500 @enderror" placeholder="Email" />
                                    <label for="email" class="absolute left-3 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Email
                                    </label>

                                    @error('email')
                                        @include('partials.error', ['message' => $message])
                                    @enderror

                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="password" name="password" type="password" class="hover:bg-pink-100 rounded-lg peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 @error('password') border-red-500 @enderror" placeholder="Password" />
                                    <label for="password" class="absolute left-3 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Password
                                    </label>

                                    @error('password')
                                        @include('partials.error', ['message' => $message])
                                    @enderror

                                </div>

                                @foreach([
                                    'forgot' => 'Forgot your password?',
                                    'register' => 'Sign up?',
                                    ]
                                    as $route => $name)
                                    <div>
                                        <a href="{{ route($route) }}" class="font-medium text-rose-900 hover:bg-pink-100 rounded-md p-2">{{ $name }}</a>
                                    </div>
                                @endforeach

                                <button type="submit" class="text-center w-full rounded-md text-white py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
