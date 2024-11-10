<div class="p-6 bg-black border-b border-gray-200">
    <h3 class="text-lg font-semibold mb-4 text-black">{{ __('Edit Profile') }}</h3>

    @if (session()->has('message'))
        <div class="text-green-600 mb-4">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="saveProfile">
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block font-medium text-sm text-gray-300">{{ __('Name') }}</label>
            <input type="text" wire:model="name" id="name" class="mt-1 block w-full p-2 bg-gray-700 text-black border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block font-medium text-sm text-gray-300">{{ __('Email') }}</label>
            <input type="email" wire:model="email" id="email" class="mt-1 block w-full p-2 bg-gray-700 text-black border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block font-medium text-sm text-gray-300">{{ __('New Password (leave empty if not changing)') }}</label>
            <input type="password" wire:model="password" id="password" class="mt-1 block w-full p-2 bg-gray-700 text-black border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-300">{{ __('Confirm Password') }}</label>
            <input type="password" wire:model="password_confirmation" id="password_confirmation" class="mt-1 block w-full p-2 bg-gray-700 text-black border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            @error('password_confirmation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="px-6 py-2 bg-blue-600 text-black rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{ __('Save Changes') }}
        </button>
    </form>
</div>
