<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use App\Models\Shipping;
use Livewire\Component;

class EditPackingOrder extends Component
{
    public Order $order;
    public $items;
    public $dataOrder;
    public $city;
    public $voucher = '';

    public $order_status;
    public $message;
    public $shipping_provider;
    public $resi;

    public function mount(Order $order)
    {
        $this->order = Order::where('id', $order->id)
            ->where('status', 'packing')
            ->with(
                'voucher',
                'items.product',
                'dataOrder.city.province',
            )
            ->firstOrFail()
            ->loadMissing('items.product', 'voucher', 'dataOrder.city.province');

        $this->items     = $this->order->items;
        $this->dataOrder = $this->order->dataOrder;
        $this->city      = $this->dataOrder?->city;
        $this->voucher = $this->order?->voucher;

        // Set initial values untuk form
        $this->order_status = $this->order->status;
        $this->message = $this->dataOrder?->message ?? '';
        $this->shipping_provider = '';
        $this->resi = '';
    }

    public function rules()
    {
        return [
            'order_status' => 'required|in:confirmed,packing,shipping,canceled',
            'message' => 'required|string|max:500',
            'shipping_provider' => 'required',
            'resi' => 'required'
        ];
    }

    public function update()
    {
        $this->validate();

        // Cek kalau status sama dengan sebelumnya
        if ($this->order_status === $this->order->status) {
            return back()->with('error', 'Status tidak boleh sama!');
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

            Shipping::create([
                'order_id' => $this->order->id,
                'shipping_provider' => $this->shipping_provider,
                'resi' => $this->resi
            ]);


            $this->order->loadMissing('items.product', 'voucher', 'dataOrder.city.province');
            return redirect('/dashboard/orders?status=shipping')->with('success', 'Data Berhasil Diperbarui');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memperbarui pesanan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.orders.edit-packing-order', [
            'order'     => $this->order,
            'items'     => $this->items,
            'dataOrder' => $this->dataOrder,
            'city'      => $this->city,
        ]);
    }
}
