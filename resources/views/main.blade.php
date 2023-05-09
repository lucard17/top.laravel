<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>L17</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    <div class="max-w-4xl mx-auto">
        <header class="h-12 bg-slate-900 text-slate-100 px-8">
            <nav class="flex flex-row h-full items-center gap-4">
                <a href="{{ route('news.articles') }}">News</a>
                <a href="{{ route('news.categories') }}">Categories</a>
            </nav>
        </header>
        <section class="mt-4 px-8">
            @yield('content')
        </section>
    </div>
    @livewireScripts
</body>

</html>