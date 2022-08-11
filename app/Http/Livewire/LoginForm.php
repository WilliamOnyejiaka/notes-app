<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginForm extends Component
{
    public function render()
    {
        return view('livewire.login-form');
    }
}
