<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class EditShippingOrder extends Component
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
            ->where('status', 'shipping')
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

    public function rules()
    {
        return [
            'order_status' => 'required|in:shipping,success,canceled',
            'message' => 'nullable|string|max:500',
        ];
    }

    public function update()
    {
        $this->validate();

        try {
            $this->order->update([
                'status' => $this->order_status,
            ]);

            if ($this->dataOrder) {
                $this->dataOrder->update([
                    'message' => $this->message,
                ]);
            }

            return redirect('/dashboard/orders?status=packing')->with('success', 'Data Berhasil Diperbarui');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui pesanan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.orders.edit-shipping-order', [
            'order'     => $this->order,
            'items'     => $this->items,
            'dataOrder' => $this->dataOrder,
            'city'      => $this->city,
            'shipping'  => $this->shipping
        ]);
    }
}
