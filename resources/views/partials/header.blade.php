<header class="m-5 bg-gradient-to-r from-blue-200 to-pink-200 rounded-md">
    <nav class="border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 ">
        <!-- Sweet Castle Logo, Brand name, Slogan -->
        <div class="flex flex-wrap flex-col justify-between items-center mx-auto max-w-screen-xl">
            <a href="{{ route("home") }}" class="flex items-center flex-row">
                <img src="/ico/logo.png" class="mr-3 h-10 sm:h-16" alt="Sweet Castle Logo" />
                <h1 class="text-5xl sm:text-7xl font-bold text-center sweet-font text-pink-600 drop-shadow-lg">
                    Sweet Castle
                </h1>
            </a>
            <h2 class="text-2xl sm:text-4xl text-center sweet-font text-pink-500 drop-shadow-md">
                Welcome to the fairytale kingdom!
            </h2>
        </div>

        <!-- Nav -->
        <div class="flex flex-wrap flex-auto justify-between items-center mx-auto max-w-screen-xl">
            <!-- Header button -->
            <div id="dropdownHoverButton"
                 data-dropdown-toggle="dropdownHover1"
                 data-dropdown-trigger="hover"
                 class="flex items-center  lg:order-1">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-blue-50 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        {{ \App\Services\GreetingsServices::handle() }},
                        @auth("web")
                            {{ Auth::user()->name }}!
                        @endauth
                        @guest("web")
                            guest!
                        @endguest
                    </span>
                </button>

                <!-- Content -->
                <div id="dropdownHover1" class="hidden">
                    @guest("web")
                        <a href="{{ route("login") }}"
                           class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl active:bg-gradient-to-br active:from-pink-300 active:to-orange-600 focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Log in
                        </a>
                    @endguest
                    @auth("web")
                        <button class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl active:bg-gradient-to-br active:from-pink-300 active:to-orange-600 focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <a href="{{ route("logout") }}">
                                Logout
                            </a>
                        </button>
                    @endauth
                </div>
            </div>


            <div class="flex items-center lg:order-2">
                @auth("web")
                    @livewire('button-cart')
                @endauth

                <button data-collapse-toggle="mobile-menu-2" type="button" class="mr-2 mb-2 inline-flex items-center p-2 ml-1 text-sm rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-center items-center w-full lg:flex lg:w-auto lg:order-1 lg:w-1/3" id="mobile-menu-2">
                <ul class="w-full flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    @foreach([
                        'products.index' => 'Marketplace',
                        'contacts' => 'Contacts',
                        ] as $route => $name)

                            <a href="{{ route("$route") }}" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl active:bg-gradient-to-br active:from-pink-300 active:to-orange-600 focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                {{ $name }}
                            </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
