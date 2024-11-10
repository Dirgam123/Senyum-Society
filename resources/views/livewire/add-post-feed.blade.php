<div>
    <form wire:submit.prevent="store" class="grid gap-3" enctype="multipart/form-data">
        @if (session()->has('success'))
            <span class="text-green-500">
                {{ session()->get('success') }}
            </span>
        @endif

        <div class="grid">
            <label for="">File:</label>
            <input type="file" wire:model="coverImage"
                class="file:rounded-md file:bg-purple-500 file:text-black rounded-md border file:border-none p-4"
                id="coverImage">
            @error('coverImage')
                <div class="text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="grid">
            <label for="">Body:</label>
            <textarea wire:model="body" id="body" class="border border-gray-300 focus:outline-purple-500 rounded-md"
                cols="10" rows="5"></textarea>
            @error('body')
                <div class="text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <button type="submit" class="bg-purple-500 text-black px-6 py-2 rounded-md">Post</button>
        </div>
    </form>
</div>
