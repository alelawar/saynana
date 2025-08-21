<div>
    {{-- Input Password --}}
    <div class="mb-3">
        <label for="password" class="block text-sm font-medium">Password</label>
        <input id="password" type="{{ $isShow ? 'text' : 'password' }}"
               wire:model.defer="password"
               name="password"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
    </div>

    {{-- Input Confirm Password --}}
    <div class="mb-3">
        <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
        <input id="password_confirmation" type="{{ $isShow ? 'text' : 'password' }}"
               wire:model.defer="password_confirmation"
               name="password_confirmation"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
    </div>

    {{-- Toggle Show/Hide --}}
    <button type="button"
            wire:click="$toggle('isShow')"
            class="text-sm text-blue-600 hover:underline">
        {{ $isShow ? 'Hide' : 'Show' }} Password
    </button>
</div>
