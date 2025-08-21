<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class EditSuccessOrder extends Component
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
            ->where('status', 'success')
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
            'order_status' => 'required|in:success,canceled',
            'message' => 'required|string|max:500',
        ];
    }

    public function update()
    {
        $this->validate();

        $this->validate();
        if ($this->order_status === $this->order->status) {
            return back()->with('error', 'Status tidak boleh sama!');
        }

        if ($this->dataOrder && $this->message === $this->dataOrder->message) {
            return back()->with('error', 'Pesan Perlu Diperbarui!');
        }

        try {
            $this->order->update([
                'status' => $this->order_status,
            ]);

            if ($this->dataOrder) {
                $this->dataOrder->update([
                    'message' => $this->message,
                ]);
            }

            return redirect('/dashboard/orders?status=success')->with('success', 'Data Berhasil Diperbarui');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui pesanan: ' . $e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.orders.edit-success-order', [
            'order'     => $this->order,
            'items'     => $this->items,
            'dataOrder' => $this->dataOrder,
            'city'      => $this->city,
            'shipping'  => $this->shipping
        ]);
    }
}
