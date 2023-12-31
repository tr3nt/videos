<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Videos' }}</title>
        @vite('resources/css/app.css')
    </head>
    <body class="h-screen text-center">
        <header>
            <nav class="flex justify-between items-center mx-auto w-[90%]">
                <div class="text-2xl leading-[4rem]">
                    <a href="{{ route('index') }}">Videos</a>
                </div>
                <div class="leading-[4rem]">
                    <ul class="flex items-center gap-[4vw]">
                    @auth
                        <li><a class="hover:text-red-900" href="{{ route('home') }}">Inicio</a></li>
                    @endauth
                    @role('admin')
                        <li><a class="hover:text-red-900" href="{{ route('manage') }}">Videos</a></li>
                        <li><a class="hover:text-red-900" href="{{ route('searches') }}">Busquedas</a></li>
                    @endrole
                    </ul>
                </div>
                <div>
                    <ul class="flex items-center gap-[2vw]">
                    @guest
                        <li><a class="hover:text-red-900" href="{{ route('login') }}">Ingreso</a></li>
                        <li><a class="hover:text-red-900" href="{{ route('register') }}">Registro</a></li>
                    @endguest
                    @auth
                        @livewire('auth.logout')
                    @endauth
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="flex h-screen bg-gray-200 w-full justify-center items-center">
                {{ $slot }}
            </div>
        </main>
    </body>
</html>