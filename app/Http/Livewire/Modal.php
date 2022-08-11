<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $message;
    public $color;

    // public function mount($message){
    //     $this->message = $message;
    // }

    public function render()
    {
        return view('livewire.modal');
    }
}
