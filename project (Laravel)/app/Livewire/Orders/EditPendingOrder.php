<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class EditPendingOrder extends Component
{
    public Order $order;
    public $items;
    public $dataOrder;
    public $city;
    public $shipping;
    public $voucher = '';

    public $order_status;
    public $message;

    public function mount(Order $order)
    {
        $this->order = Order::where('id', $order->id)
            ->where('status', 'pending')
            ->with(
                'voucher',
                'shipping',
                'items.product',
                'dataOrder.city.province',
            )
            ->firstOrFail();

        $this->items     = $this->order->items;
        $this->dataOrder = $this->order->dataOrder;
        $this->city      = $this->dataOrder?->city;
        $this->voucher   = $this->order?->voucher;
        $this->shipping  = $this->order->shipping;

        // Set initial values untuk form
        $this->order_status = $this->order->status;
        $this->message = $this->dataOrder?->message ?? '';
    }




    public function render()
    {
        return view('livewire.orders.edit-pending-order', [
            'order'     => $this->order,
            'items'     => $this->items,
            'dataOrder' => $this->dataOrder,
            'city'      => $this->city,
            'shipping'  => $this->shipping
        ]);
    }
}
