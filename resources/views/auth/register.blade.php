@extends('layouts.app')

@section('title', 'Sign up')

@section('content')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Sign up</h1>

            <form action="{{ route("register_process") }}" method="POST" class="space-y-5 mt-5">
                @csrf

                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Name" />

                @error('name')
                    @include('partials.error', ['message' => $message])
                @enderror

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" />

                @error('email')
                    @include('partials.error', ['message' => $message])
                @enderror

                <input name="password" type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Password" />

                @error('password')
                    @include('partials.error', ['message' => $message])
                @enderror

                <input name="password_confirmation"  type="password" class="w-full h-12 border border-gray-800 rounded px-3"  placeholder="Confirm password" />

                <div>
                    <a href="{{ route('login') }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Have an account?</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Sign up</button>
            </form>
        </div>
    </div>
@endsection
