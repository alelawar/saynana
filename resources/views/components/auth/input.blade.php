<div>
    <label for="{{ $name }}" class="sr-only">{{ $label }}</label>
    <input 
        id="{{ $name }}" 
        name="{{ $name }}" 
        type="{{ $type }}" 
        @if(!empty($required) && $required) required @endif
        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
        placeholder="{{ $placeholder }}" 
        value="{{ $value ?? '' }}"
    >
</div>
