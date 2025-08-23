<?php

namespace App\Livewire;

use Livewire\Component;

class Chatbot extends Component
{
    public $chatFlowId;

    public function mount() {
        $this->chatFlowId = env("FLOWISE_CHATFLOW_ID");
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}
