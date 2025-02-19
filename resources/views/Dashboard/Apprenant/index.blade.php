<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h3 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Available Formations
                </h3>
                <p class="text-gray-600 mt-2">Discover and join our diverse range of formations</p>
            </div>
            <div class="text-sm text-gray-600">
                Total Formations: {{ $formations->count() }}
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($formations as $formation)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 ease-in-out">
                    <div class="relative p-6 bg-gradient-to-r from-indigo-600 to-purple-600">
                        <h4 class="text-xl font-bold text-white mb-3">{{ $formation->title }}</h4>
                        <p class="text-gray-200 text-sm line-clamp-2 mb-4">{{ $formation->description }}</p>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                                <span class="text-white font-semibold">{{ substr($formation->user->name, 0, 1) }}</span>
                            </div>
                            <p class="text-white text-sm">By {{ $formation->user->name }}</p>
                        </div>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('formation.join', $formation->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to join {{ $formation->title }}?');">
                            @csrf
                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-xl 
                                       transition duration-200 ease-in-out transform hover:scale-105 
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                       flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                <span>Join Formation</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>