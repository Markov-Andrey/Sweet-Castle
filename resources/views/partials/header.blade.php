<?php
    $time = date('H:i');
    if($time >= '06:00' && $time < '12:00'){
        $greetings = 'Good morning';
    } elseif ($time >= '12:00' && $time < '18:00') {
        $greetings = 'Good afternoon';
    } else {
        $greetings = 'Good evening';
    }
?>

<header class="m-5 bg-gradient-to-r from-blue-200 to-pink-200 rounded-md">
    <nav class="border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 ">
        <!-- Sweet Castle Logo, Brand name, Slogan -->
        <div class="flex flex-wrap flex-col justify-between items-center mx-auto max-w-screen-xl">
            <a href="{{ route("home") }}" class="flex items-center flex-row">
                <img src="/ico/logo.png" class="mr-3 h-6 sm:h-10" alt="Sweet Castle Logo" />
                <h1 class="text-7xl font-bold text-center sweet-font text-pink-600 drop-shadow-lg">
                    Sweet Castle
                </h1>
            </a>
            <h2 class="text-3xl text-center sweet-font text-pink-500 drop-shadow-md">Welcome to the fairytale kingdom!</h2>
        </div>

        <div class="flex flex-wrap flex-auto justify-between items-center mx-auto max-w-screen-xl">
            <div class="flex items-center">
                <p class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    {{ $greetings }},
                    @auth("web")
                        {{ Auth::user()->name }}
                    @endauth
                    @guest("web")
                        guest
                    @endguest
                </p>
                @auth("web")
                    @livewire('button-cart')
                @endauth
            </div>
            <div class="flex items-center lg:order-2">

                <a href=
                @auth("web") "{{ route("logout") }}" @endauth
                @guest("web") "{{ route("login") }}" @endguest
                    class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                @auth("web") Logout @endauth
                @guest("web") Log in @endguest
                </a>

                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    @foreach([
                        'products.index' => 'Marketplace',
                        'contacts' => 'Contacts',
                        ] as $route => $name)
                        <li>
                            <a href="{{ route("$route") }}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">{{ $name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
