@extends('layouts.app')

@section('title', 'Contact us')

@section('content')
    @include('partials.header')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Contact us</h1>

            <form action="{{ route("contact_form_process") }}" method="POST" class="space-y-5 mt-5">
                @csrf

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror" placeholder="Email" />

                @error('email')
                    @include('partials.error')
                @enderror

                <input  name="text" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('text') border-red-500 @enderror" placeholder="Message" />

                @error('text')
                    @include('partials.error')
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Send</button>
            </form>
        </div>
    </div>
@endsection
