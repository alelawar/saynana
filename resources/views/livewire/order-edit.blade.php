<div>
    @if($component)
        @livewire($component, ['order' => $order], key($component . '-' . $order->id))
    @else
        <p class="text-gray-500">Order tidak bisa diubah.</p>
    @endif
</div>