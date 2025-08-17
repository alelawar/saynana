<?php

namespace App\Livewire;

use Livewire\Component;

class Password extends Component
{
    public $isShow = false;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.password');
    }
}
