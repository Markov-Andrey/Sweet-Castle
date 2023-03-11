@extends('layouts.app')

@section('title', 'Password recovery')

@section('content')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Password recovery</h1>

            <form class="space-y-5 mt-5" method="POST" action="forgot_process">
                @csrf
                <input name="email" type="text" class="w-full h-12 border rounded px-3  @error('text') border-red-500 @enderror" placeholder="Email" />

                @error('email')
                    @include('partials.error', ['message' => $message])
                @enderror

                <div>
                    <a href="{{ route("login") }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Remembered the password</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Recover</button>
            </form>
        </div>
    </div>
@endsection
