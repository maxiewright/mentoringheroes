<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ConnectComponent extends Component
{
    public User $user;

    public bool $signIn = false;
    public bool $emailConnect = false;
    public bool $showPassword = false;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email|unique:users,email',
        'user.password' => 'required'
    ];

//    public function updatedUserEmail()
//    {
//        $this->validateOnly('user.email');
//    }

    public function mount()
    {
        $this->user = User::make();
    }

    public function register()
    {
        $this->validate();

        dd($this->user);
        $this->user->save();


    }

    public function render()
    {
        return view('livewire.connect-component');
    }
}
