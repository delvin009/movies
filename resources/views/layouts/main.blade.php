<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movie App</title>

        <link rel="stylesheet" href="/css/main.css">

        <livewire:styles>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>

    <body class="font-sans bg-gray-900 text-white">

        <nav class="border-b border-gray-800">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-center">
                    <li>
                        <a href="{{route('movies.index')}}">
                            <img src="/logo/tmdb.jpg" class="" height="50" width="50"/>
                        </a>
                    </li>

                    <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="{{route('movies.index')}}" class="hover:text-green-300">Movies</a>
                    </li>

                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{route('tvshows.index')}}" class="hover:text-green-300">TV Shows</a>
                    </li>

                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{route('actors.index')}}" class="hover:text-green-300">Actors</a>
                    </li>
                </ul>

                <div class="flex flex-col md:flex-row items-center">
                    <livewire:search-dropdown> <!-- from search-dropdown.blade.php -->
                    <div class="md:ml-4 mt-3 md:mt-0">
                        <a href="#">
                            <img src="/avatar/default-avatar.jpg" alt="avatar" class="rounded-full w-8 h-8">
                        </a>
                    </div>
                </div
            </div>
        </nav>

        <div class="container">
            @yield('content')
            <livewire:scripts>
            @yield('scripts') <!--index(actors)(scrolling) -->
        </div>
    </body>
</html>
