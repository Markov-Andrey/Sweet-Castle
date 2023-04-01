@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Admin Login</h1>
            <h2 class="text-xl font-medium italic">Welcome, boss!</h2>

            <form action="{{ route("admin.login_process") }}" method="POST" class="space-y-5 mt-5">
                @csrf

                <input name="email" type="text" class="w-full h-12 border @error('email') border-red-500 @enderror rounded px-3" placeholder="Email" />

                @error('email')
                    @include('partials.error', ['message' => $message])
                @enderror

                <input name="password" type="password" class="w-full h-12 border @error('password') border-red-500 @enderror border-gray-800 rounded px-3" placeholder="Password" />

                @error('password')
                    @include('partials.error', ['message' => $message])
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Log in</button>
            </form>
        </div>
    </div>
@endsection
