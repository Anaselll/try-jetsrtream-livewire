  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <main class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
      <aside class="w-64 bg-gray-900 text-white p-5 h-full sticky top-0">
    <h3 class="text-xl font-semibold border-b border-gray-700 pb-3">Admin Panel</h3>
    <ul class="mt-5 space-y-2">
     <!-- Sidebar links - Fixed parameter ordering -->
<li>
    <a href="#" wire:click="$dispatch('changeSection', {s: 'createFormation'})" 
        class="block py-3 px-4 rounded-lg hover:bg-gray-700 transition">Create Formation</a>
</li>
<li>
    <a href="#" wire:click="$dispatch('changeSection', {s: 'formationsAvailable'})"
        class="block py-3 px-4 rounded-lg hover:bg-gray-700 transition">Formations Available</a>
</li>
    </ul>
</aside>
        {{-- right side --}}
        <section class="flex-1 p-6 overflow-auto">
           
        <div>
    <!-- Simple content to test if component works -->
    <h3 class="text-2xl font-bold">Dashboard Admin Component</h3>
    <p>Current section: {{ $section }}</p>
    
    @if($section === 'formationsAvailable')
      <div class="container mx-auto px-4 py-6">
        <h3 class="text-2xl font-semibold mb-4">Available Formations</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($formations as $formation)
                <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">{{ $formation->title }}</h4>
                        <p class="text-gray-600 mt-2">{{ $formation->description }}</p>
                        <p class="text-gray-500 text-sm mt-2">By: {{ $formation->user->name }}</p>
                    </div>

                    <form action="{{ route('formation.join', $formation->id) }}" method="POST" class="mt-4">
                        @csrf
                        
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    @elseif($section === 'createFormation')
     <x-create-formation/>
    @endif
</div>
        </section>
    </main>