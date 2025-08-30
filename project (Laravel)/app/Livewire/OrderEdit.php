<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderEdit extends Component
{
    public Order $order;

    protected $map = [
        'paid' => 'orders.edit-confirmed-order',
        'packing' => 'orders.edit-packing-order',
        'shipping'  => 'orders.edit-shipping-order',
        'success'  => 'orders.edit-success-order',
        'canceled'  => 'orders.edit-canceled-order',
    ];
    public function render()
    {
        $component = $this->map[$this->order->status] ?? null;
        return view('livewire.order-edit', [
            'order' => $this->order,
            'component' => $component
        ]);
    }
}
