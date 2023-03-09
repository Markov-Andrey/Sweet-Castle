<nav class="border border-gray-900 rounded-lg my-4 py-2">
    <h2 class="text-3xl text-center">Welcome to the fairytale kingdom</h2>
    <a href="{{ route("home") }}">
        <h1 class="text-3xl font-bold text-center">Sweet Castle</h1>
    </a>

    @auth("web")
        <p>Hello, {{ Auth::user()->name }}</p>
        <a href="{{ route("logout") }}" class="text-md no-underline hover:text-blue-dark ml-2 px-1">Logout</a>
    @endauth

    @guest("web")
        <a href="{{ route("login") }}" class="text-md no-underline hover:text-blue-dark ml-2 px-1">Login</a>
    @endguest

</nav>
