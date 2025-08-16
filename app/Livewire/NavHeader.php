<?php

namespace App\Livewire;

use Livewire\Component;

class NavHeader extends Component
{
    public $totalQty = 0;

    protected $listeners = [
        'cartUpdated' => 'updateCartCount',
        'updateTotalQty' => 'updateCartCount'
    ];

    public function mount()
    {
        $this->updateCartCount();
    }

    public function updateCartCount()
    {
        $cart = session()->get('cart', []);
        $this->totalQty = collect($cart)->sum('qty');
    }

    public function render()
    {
        return view('livewire.nav-header');
    }
}