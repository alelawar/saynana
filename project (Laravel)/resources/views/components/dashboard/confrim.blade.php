<!-- resources/views/components/confirm-modal.blade.php -->
@props([
    'title' => 'Konfirmasi',
    'message' => 'Yakin ingin melanjutkan?',
    'confirmText' => 'Ya',
    'cancelText' => 'Batal',
    'confirmClass' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500',
    'icon' => 'warning'
])

<div 
    x-show="show" 
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    @click="show = false"
    @keydown.escape="show = false">
    
    <div 
        @click.stop
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-white rounded-lg p-6 max-w-sm mx-4 shadow-xl">
        
        <div class="flex items-center mb-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 @if($icon === 'warning') bg-red-100 @elseif($icon === 'info') bg-blue-100 @else bg-gray-100 @endif rounded-full flex items-center justify-center">
                    @if($icon === 'warning')
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    @elseif($icon === 'info')
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    @endif
                </div>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">
                    {{ $title }}
                </h3>
                <p class="text-sm text-gray-500 mt-1">
                    {{ $message }}
                </p>
            </div>
        </div>
        
        <div class="flex justify-end space-x-3">
            <button 
                @click="show = false"
                type="button" 
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                {{ $cancelText }}
            </button>
            
            <button 
                @click="confirmAction(); show = false"
                type="button"
                class="px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200 {{ $confirmClass }}">
                {{ $confirmText }}
            </button>
        </div>
    </div>
</div>