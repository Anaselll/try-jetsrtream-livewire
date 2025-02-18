<div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create a New Formation</h2>
    <form wire:submit.prevent='creer_formation' class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium">Title</label>
            <input type="text" wire:model="title" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" required>
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-medium">Description</label>
            <textarea wire:model="description" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300" rows="4" required></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-medium">Id de user</label>
            <input type="text" wire:model="user_id" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300">
            @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">Submit</button>
    </form>
</div>
