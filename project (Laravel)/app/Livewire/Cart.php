<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $isOpen = false;
    protected $listeners = ['cartUpdated' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = session()->get('cart', []);
    }

    public function getTotalQuantity()
    {
        return array_sum(array_column($this->cart, 'qty'));
    }

    public function toggleCart() 
    {
        $this->isOpen = !$this->isOpen;
    }

    // Atau bisa juga pakai computed property
    public function getTotalQuantityProperty()
    {
        return collect($this->cart)->sum('qty');
    }

    public function removeItem($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if (count($cart) === 1 && $cart[$productId]['qty'] === 1) {
                return $this->clearCart();
            }

            if ($cart[$productId]['qty'] > 1) {
                $cart[$productId]['qty'] -= 1;
                session()->put('cart', $cart);
            } else {
                unset($cart[$productId]);

                if (empty($cart)) {
                    session()->forget('cart');
                } else {
                    session()->put('cart', $cart);
                }
            }
        }
        $this->loadCart();
        $this->dispatch('cartUpdated');
    }

    public function clearCart()
    {
        session()->forget('cart');
        $this->loadCart();
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
