<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignUpForm extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $color = "danger";
    // public $message;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:3',
    ];

    public function render()
    {
        return view('livewire.sign-up-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submit()
    {
        $validatedData = $this->validate();
        $created_user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        if($created_user){
            Session::put('loginId', $created_user->id);
            Session::put('loginEmail', $created_user->email);
            return redirect('home');
        }else {
            return back()->with('error',"Something went wrong");
        }
    }
}
