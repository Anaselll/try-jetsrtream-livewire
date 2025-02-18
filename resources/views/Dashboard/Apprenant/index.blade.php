<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h3 class="text-3xl font-bold text-gray-900 mb-8">Available Formations</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($formations as $formation)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out">
                    <div class="p-6 bg-gradient-to-r from-indigo-600 to-purple-600">
                        <h4 class="text-xl font-bold text-white">{{ $formation->title }}</h4>
                        <p class="text-gray-200 mt-2 text-sm">{{ $formation->description }}</p>
                        <p class="text-gray-900 text-xs mt-2">By le formateur : {{ $formation->user->name }}</p>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('formation.join', $formation->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Join Formation
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>