@props([
    'name',
    'label' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'showPassword' => false, // default false
])

<div 
    x-data="{ show: {{ $showPassword ? 'true' : 'false' }} }" 
    class="relative"
>
    <label for="{{ $name }}" class="sr-only">{{ $label }}</label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        :type="show ? 'text' : '{{ $type }}'"
        @if($required) required @endif
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        class="appearance-none rounded-none relative block w-full px-3 py-2 pr-10 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
    >

    @if($type === 'password')
        <button type="button"
            @click="show = !show"
            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 cursor-pointer"
        >
            {{-- Mata tertutup --}}
            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            {{-- Mata terbuka --}}
            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.174-3.592m2.495-2.497A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.97 9.97 0 01-2.174 3.592m-2.495 2.497L4.5 4.5" />
            </svg>
        </button>
    @endif
</div>
