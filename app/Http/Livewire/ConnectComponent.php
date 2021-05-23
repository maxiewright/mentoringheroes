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

    public bool $signIn = false;
    public bool $signUp = false;
    public bool $showPassword = false;
    public string $email = '';
    public string $password = '';
    public bool $remember = true;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'refreshComments' => 'resetComponent',
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

    public function signUp()
    {
        $this->signIn = false;
        $this->signUp = true;
    }

    public function signIn()
    {
        $this->signUp = false;
        $this->signIn = true;
    }

    public function resetConnect()
    {
        $this->signIn = false;
        $this->signUp = false;
        $this->showPassword = false;
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
            $this->emit('refreshComments');
            session()->flash('message', 'Welcome Back');
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
        auth()->login($this->user->fresh(), true);
    }

    public function render()
    {
        return view('livewire.connect-component');
    }
}
