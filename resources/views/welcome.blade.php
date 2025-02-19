<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Training Management Platform</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body {
                margin: 0;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f8fafc; /* Light background color */
                font-family: 'Figtree', sans-serif;
            }
        </style>
    @endif
    @livewireStyles
</head>
<body class="font-sans antialiased dark:bg-gray-900 dark:text-white">
    <div class="bg-gray-50 text-black dark:bg-gray-900 dark:text-white">
        <!-- Fixed top navigation -->
        <header class="fixed top-0 left-0 right-0 z-50 bg-gray-50/90 dark:bg-gray-900/90 backdrop-blur-sm py-4 shadow-sm">
            <div class="w-full max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center">
                    <div class="flex-1">
                        <!-- Logo -->
                        <a href="/" class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 12h3.058v4.354H12V12z" />
                            </svg>
                            <span class="text-xl font-bold text-gray-800 dark:text-white">Training Management</span>
                        </a>
                    </div>
                    
                    @if (Route::has('login'))
                    <nav class="flex space-x-4">
                        @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-4 py-2 text-sm font-medium text-gray-800 dark:text-white ring-1 ring-transparent transition-all hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                        >
                            Dashboard
                        </a>
                        @else
                        @if (Route::has('login'))
                        <a
                            wire:navigate
                            href="{{ route('login') }}"
                            class="rounded-md px-4 py-2 text-sm font-medium text-gray-800 dark:text-white ring-1 ring-transparent transition-all hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                        >
                            Login
                        </a>
                        @endif
                        @if (Route::has('register'))
                        <a
                            wire:navigate
                            href="{{ route('register') }}"
                            class="rounded-md px-4 py-2 text-sm font-medium text-gray-800 dark:text-white ring-1 ring-transparent transition-all hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
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
        
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-indigo-500 selection:text-white pt-16">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <!-- Content Section -->
                <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 transition-all hover:shadow-2xl transform hover:scale-105 duration-300 ease-in-out">
                    <h1 class="text-3xl font-bold text-center mb-6 text-gray-800 dark:text-white">Welcome to Training Management</h1>
                    <p class="mt-6 text-center text-gray-600 dark:text-gray-400">
                        Explore our platform to manage your training programs efficiently.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>