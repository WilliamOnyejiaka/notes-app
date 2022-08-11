<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $title;
    public $body;
    public $noteId;

    public function render()
    {
        return view('livewire.card');
    }
}
