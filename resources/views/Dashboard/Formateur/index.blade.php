<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <h3 class="text-2xl font-semibold mb-4">your formations that you are currenttly teach</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($formations as $formation)
                <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">{{ $formation->title }}</h4>
                        <p class="text-gray-600 mt-2">{{ $formation->description }}</p>
                        <p class="text-gray-500 text-sm mt-2">By: {{ $formation->user->name }}</p>
                    </div>

                  
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
