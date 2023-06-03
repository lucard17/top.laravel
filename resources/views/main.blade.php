<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L17</title>
    @livewireStyles
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset ('favicon.ico') }}">
</head>

<body class='bg-slate-950 text-slate-100'>
    {{--

    <body --}} <div class="max-w-4xl mx-auto">
        <header class="h-12 bg-slate-900 text-slate-100 px-8">
            <nav class="flex flex-row h-full items-center gap-4">
                <a href="{{ route('home') }}" class="hover:underline">{{ __('news') }}</a>
                <a href="{{ route('news.categories') }}" class="hover:underline">Categories</a>
                @auth<a href="{{ route('news.articles') }}" class="ms-auto hover:underline">My articles</a> @endauth
                {{ Session::get('locale') }}
                <livewire:language-switch />
                @guest
                <a href="{{ route('auth',['action'=>'login']) }}" class="px-2 py-1 font-semibold text-slate-50 border border-slate-50 
                    hover:bg-slate-50 hover:text-slate-950 ms-auto">Login</a>
                <a href="{{ route('auth',['action'=>'register']) }}" class="px-2 py-1 font-semibold text-slate-50 border border-slate-50 
                    hover:bg-slate-50 hover:text-slate-950">Register</a>
                @endguest
                @auth
                <span class=''>{{ auth()->user()->name }}</span>
                <a href="{{ route('auth',['action'=>'logout']) }}" class="px-2 py-1 font-semibold text-slate-50 border border-slate-50 
                    hover:bg-slate-50 hover:text-slate-950">
                    Logout
                </a>
                @endauth
            </nav>
        </header>
        <section class="mt-4 px-8">
            @yield('content')
        </section>
        </div>
        @livewireScripts
        {{-- <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg> --}}
    </body>

</html>