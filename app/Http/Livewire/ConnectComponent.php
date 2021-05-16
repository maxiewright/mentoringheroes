<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class ConnectComponent extends Component
{
    public User $user;

    public bool $signIn = false;
    public bool $emailConnect = false;
    public bool $showPassword = false;

    // Login
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email|unique:users,email',
        'user.password' => 'required'
    ];

    protected $messages = [

        //Login
        'email.required' => 'Your email is require',
        'email.email' => 'Please enter a valid email',
        'email.exists' => 'Sorry! We cannot find your email',

    ];

    public function updatedUserEmail()
    {
        $this->validateOnly('user.email');
    }

    public function mount()
    {
        $this->user = User::make();
    }

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if (\Auth::attempt($credentials, $this->remember)) {
            return redirect()->intended('/');
        }

        $this->addError('password', 'The password is incorrect' );

    }

    public function register(): RedirectResponse
    {
        $this->validate();

        $this->user->save();

        auth()->login($this->user->fresh());

        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.connect-component');
    }
}
