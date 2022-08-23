@props([
    'title' => 'Wordpress Jobs - Find your next Wordpress job',
    'main' => 'Main Content',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-inter antialiased bg-slate-100 text-slate-600">
    <div class="px-4 sm:px-6 lg:px-8 py-4 w-full max-w-screen-xl mx-auto">

        <header class="flex w-full item-center justify-between mb-10">
            <div>
                <x-unit.logo />
            </div>
            <div class="flex items-center">
                <button class="btn bg-indigo-500 font-medium hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2">Post A Job - $50</span>
                </button>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer
            class="py-6 border-t border-slate-200 text-slate-600 flex justify-between mt-8 flex-col md:flex-row text-sm">
            <div>Wordpressjobs.io is not affiliated with Wordpress</div>
            <div>Created by <a href="#" class="text-indigo-600">Adam Davies</a></div>
        </footer>

    </div>

    @livewireScripts
    @yield('scripts')
</body>

</html>
