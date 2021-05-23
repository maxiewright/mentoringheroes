<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class ConnectComponent extends Component
{
    public User $user;

    public bool $signIn = true;
    public bool $signUp = false;
    public bool $forgotPassword = false;
    public bool $showPassword = false;
    public string $email = '';
    public string $password = '';
    public bool $remember = true;

    protected $listeners = [
        'refreshComponent' => '$refresh'
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

    public function signIn()
    {
        $this->forgotPassword = false;
        $this->signUp = false;
        $this->signIn = true;
    }

    public function signUp()
    {
        $this->signIn = false;
        $this->signUp = true;
    }

    public function forgotPassword()
    {
        $this->signIn = false;
        $this->signUp = false;
        $this->forgotPassword = true;
    }

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

            $this->emit('refreshComponent');

            return;
        }

        $this->addError('password', 'The password is incorrect' );

    }

    public function register()
    {
        $this->validate();

        $this->user->save();

        $user = $this->user->fresh();

        auth()->login($user, $this->remember);

        event(new Registered($user));
    }

    public function verify()
    {
        auth()->login($this->user->fresh(), $this->remember);
    }

    public function render()
    {
        return view('livewire.connect-component');
    }
}
