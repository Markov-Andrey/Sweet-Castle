@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <!--
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Login</h1>

            <form action="{{ route("login_process") }}" method="POST" class="space-y-5 mt-5">


                <input name="email" type="text" class="w-full h-12 border border-red-500 rounded px-3" placeholder="Email" />


                <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Password" />


                <div>
                    <a href="{{ route("forgot") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Forgot your password?</a>
                </div>

                <div>
                    <a href="{{ route("register") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Sign up</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Log in</button>
            </form>
        </div>
    </div>
-->
    <form action="{{ route("login_process") }}" method="POST">
        @csrf

        <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-pink-300 to-pink-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="max-w-md mx-auto">
                        <div>
                            <h1 class="text-center text-5xl font-semibold sweet-font text-pink-600">Login Form</h1>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input autocomplete="off" id="email" name="email" type="text" class="hover:bg-pink-100 rounded-lg peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900" placeholder="Email" />
                                    <label for="email" class="absolute left-3 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Email
                                    </label>

                                    @error('email')
                                    @include('partials.error', ['message' => $message])
                                    @enderror
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="password" name="password" type="password" class="hover:bg-pink-100 rounded-lg peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900" placeholder="Password" />
                                    <label for="password" class="absolute left-3 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-5 peer-focus:text-gray-600 peer-focus:text-sm">
                                        Password
                                    </label>

                                    @error('password')
                                    @include('partials.error', ['message' => $message])
                                    @enderror
                                </div>
                                <div>
                                    <a href="{{ route("forgot") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Forgot your password?</a>
                                </div>

                                <div>
                                    <a href="{{ route("register") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Sign up</a>
                                </div>
                                <div class="relative">
                                    <button class="bg-blue-500 text-white rounded-md px-2 py-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
