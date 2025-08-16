<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $totalQty = 0;

    protected $listeners = ['cartUpdated' => 'updateTotalQty'];

    public function mount()
    {
        $this->updateTotalQty();
    }

    public function updateTotalQty($totalQty = null)
    {

        $this->totalQty = $totalQty;
        if ($totalQty !== null) {
            $this->totalQty = $totalQty;
        } else {
            $cart = session()->get('cart', []);
            $this->totalQty = array_sum(array_column($cart, 'qty'));
        }
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
