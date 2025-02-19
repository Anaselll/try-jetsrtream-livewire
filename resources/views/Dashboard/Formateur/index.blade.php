<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h3 class="text-2xl font-bold text-gray-900 mb-6 pl-2 border-l-4 border-blue-500">
            Your Current Teaching Formations
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($formations as $formation)
                <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl p-6 transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="space-y-4">
                        <!-- Title with gradient underline effect -->
                        <h4 class="text-lg font-bold text-gray-900 pb-2 relative">
                            {{ $formation->title }}
                            <div class="absolute bottom-0 left-0 w-1/3 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 group-hover:w-full transition-all duration-300"></div>
                        </h4>

                        <!-- Description with fade effect -->
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 group-hover:line-clamp-none transition-all duration-300">
                            {{ $formation->description }}
                        </p>

                        <!-- Instructor info with subtle background -->
                        <div class="pt-4 mt-4 border-t border-gray-100">
                            <div class="flex items-center space-x-3 bg-gray-50 rounded-lg p-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold">
                                    {{ substr($formation->user->name, 0, 1) }}
                                </div>
                                <p class="text-gray-700 text-sm font-medium">
                                    {{ $formation->user->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>