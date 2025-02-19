{{-- @props(['formateurs']) --}}
{{-- @dd($formateurs) --}}
<div class="min-h-screen bg-gray-50 flex items-center justify-center p-6">
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Header with gradient -->
        <div class="p-6 bg-gradient-to-r from-indigo-600 to-purple-600">
            <h2 class="text-2xl font-bold text-white">Create a New Formation</h2>
        </div>

        <!-- Form section -->
        <div class="p-8">
            <form wire:submit.prevent='creer_formation' class="space-y-6">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input 
                        type="text" 
                        wire:model="title" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out"
                        required
                    >
                    @error('title') 
                        <span class="mt-2 block text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea 
                        wire:model="description" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out"
                        rows="4" 
                        required
                    ></textarea>
                    @error('description') 
                        <span class="mt-2 block text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Formateur name</label>
                    <select 
                        wire:model="user_id"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-300 ease-in-out"
                        >
                        <option value="">Select a Formateur</option>
                        @if ($formateurs)  
                            @foreach ($formateurs as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        @endif
                    </select>

                    @error('user_id') 
                        <span class="mt-2 block text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-3 px-4 rounded-xl 
                           transition-all duration-300 ease-in-out transform hover:scale-105
                           focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                           flex items-center justify-center space-x-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Submit</span>
                </button>
            </form>
        </div>
    </div>
</div>
