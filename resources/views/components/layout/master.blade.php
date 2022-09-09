@props([
    'title' => 'Wordpress Jobs - Find your next Wordpress job',
    'main' => 'Main Content',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png" />
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('styles')
</head>

<body class="font-inter antialiased bg-slate-100 text-slate-600">
    <div class="px-4 sm:px-6 lg:px-8 py-4 w-full max-w-screen-xl mx-auto">

        <header class="flex w-full item-center justify-between mb-10">
            <div>
                <x-unit.logo />
            </div>
            <div class="flex items-center space-x-2 md:space-x-4">
                @if (Route::is('job.show'))
                    <x-unit.button-link-white href="/">
                        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" class="h-4 w-4 md:h-6 md:w-6 md:opacity-50">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        <span class="hidden md:block ml-1">Back To Jobs</span>
                    </x-unit.button-link-white>
                @endif
                <x-unit.button-link :href="route('job.create')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-6 md:w-6 md:opacity-50 shrink-0"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span class="hidden xs:block ml-2">Post A Job</span>
                </x-unit.button-link>
            </div>
        </header>

        <x-unit.banner />

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
    @livewire('livewire-ui-modal')
    @stack('scripts')
</body>

</html>
