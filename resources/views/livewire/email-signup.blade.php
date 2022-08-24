<div class="p-6 bg-indigo-200">
    <h3 class="font-semibold text-indigo-800">Join newsletter</h3>
    <p class="text-slate-800">Get new jobs into your inbox weekly.</p>
    <form wire:submit.prevent="submit" class="mt-4">
        <x-honeypot livewire-model="honeyData" />
        <div>
            <label for="name" class="text-sm font-semibold">Full name:</label>
            <input type="text" wire:model="name" id="name" placeholder="Enter your full name.."
                class="w-full form-input" />
            @error('name')
                <span class="text-red-500 block mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-2">
            <label for="email" class="text-sm font-semibold">Your email:</label>
            <input type="email" wire:model="email" id="email" placeholder="Enter your email.."
                class="w-full form-input" />
            @error('email')
                <span class="text-red-500 block mt-1">{{ $message }}</span>
            @enderror
        </div>
        @error('signup-error')
            <span class="text-red-500 block mt-1">{{ $message }}</span>
        @enderror
        <div class="flex items-center justify-between w-full mt-4">
            <button type="button" onclick="Livewire.emit('closeModal')" class="text-sm text-slate-800">
                Cancel & close
            </button>
            <button type="submit" class="btn bg-indigo-500 font-medium hover:bg-indigo-600 text-white">
                Join newsletter
            </button>
        </div>
    </form>
</div>
