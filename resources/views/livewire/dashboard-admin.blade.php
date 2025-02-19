<main class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <aside class="w-72 bg-gray-900 text-white h-full sticky top-0">
        <!-- Admin Profile Section -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 rounded-full bg-gray-700 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white">Admin Panel</h3>
                    <p class="text-sm text-gray-400">Manage your formations</p>
                </div>
            </div>
        </div>
 
        <!-- Navigation Menu -->
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="#" 
                        wire:click.prevent="changeSection('createFormation')"
                        class="wire:navigate flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition-all duration-200 {{ $section === 'createFormation' ? 'bg-gray-800 text-blue-400' : 'text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Create Formation</span>
                    </a>
                </li>
                <li>
                    <a href="#" 
                    wire:click.prevent="changeSection('formationsAvailable')"
                       class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition-all duration-200 {{ $section === 'formationsAvailable' ? 'bg-gray-800 text-blue-400' : 'text-gray-300' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Available Formations</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
 
    <!-- Main Content Area -->
    <section class="flex-1 overflow-auto">
        <!-- Top Bar -->
        <div class="bg-white border-b px-6 py-4 shadow-sm">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $section === 'createFormation' ? 'Create New Formation' : 'Available Formations' }}
                </h2>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">Last updated: {{ now()->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
 
        <!-- Content Area -->
        <div class="p-8">
            @if($section === 'formationsAvailable')
                <div class="mb-8">
                    <div class="flex items-center justify-between">
                        <p class="text-gray-600 text-lg">Manage and monitor all available formations</p>
                        <span class="bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm">
                            Total: {{ count($formations) }}
                        </span>
                    </div>
                </div>
 
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($formations as $formation)
                        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl border border-gray-100 transition-all duration-300 hover:translate-y-[-2px]">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h4 class="text-xl font-bold text-gray-900">{{ $formation->title }}</h4>
                                    <div class="flex items-center text-gray-500 text-sm bg-gray-50 px-3 py-1 rounded-lg">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $formation->created_at->format('M d, Y') }}
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm mb-6 line-clamp-3">{{ $formation->description }}</p>
                                <div class="flex items-center text-gray-500 text-sm pt-4 border-t ">
                                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center mr-3">
                                        <span class="font-medium text-gray-700">{{ substr($formation->user->name, 0, 1) }}</span>
                                    </div>
                                    <span class="font-medium text-gray-700">{{ $formation->user->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif($section === 'createFormation')
                @if ($formateurs->isNotEmpty())
                    <x-create-formation :formateurs="$formateurs" />
                @else
                    <p>No formateurs available.</p>  {{-- or some other appropriate message --}}
                @endif    
            @endif
        </div>
    </section>
 </main>