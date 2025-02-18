<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */
            /* Your existing Tailwind CSS styles */
        </style>
    @endif
    @livewireStyles
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
        
        <!-- Fixed top navigation -->
        <header class="fixed top-0 left-0 right-0 z-50 bg-gray-50/90 dark:bg-black/90 backdrop-blur-sm py-4">
            <div class="w-full max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center">
                    <div class="flex-1">
                        <!-- Logo could go here -->
                    </div>
                    
                    @if (Route::has('login'))
                    <nav class="flex space-x-4">
                        @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-4 py-2 text-sm font-medium text-black ring-1 ring-transparent transition hover:bg-gray-100 hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:bg-gray-800 dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                        @else
                        <a
                        wire:navigate
                            href="{{ route('login') }}"
                            class="rounded-md px-4 py-2 text-sm font-medium text-black ring-1 ring-transparent transition hover:bg-gray-100 hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:bg-gray-800 dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>
                        @if (Route::has('register'))
                        <a

                        wire:navigate
                            href="{{ route('register') }}"
                            class="rounded-md px-4 py-2 text-sm font-medium text-black ring-1 ring-transparent transition hover:bg-gray-100 hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:bg-gray-800 dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                        @endif
                        @endauth
                    </nav>
                    @endif
                </div>
            </div>
        </header>
        
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white pt-16">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <!-- Rest of your content goes here -->
            </div>
        </div>
    </div>
        @livewireScripts

</body>
</html>