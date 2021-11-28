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
    public bool $remember = true;
    public string $name;
    public string $email ;
    public string $password;
    public string $password_confirmation;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    protected $messages = [
        'email.required' => 'Your email is required',
        'email.email' => 'Please enter a valid email',
        'email.exists' => 'Sorry! We cannot find your email',
    ];

    public function mount()
    {
        $this->user = User::make();
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function signIn()
    {
        $this->mount();
        $this->signUp = false;
        $this->signIn = true;
    }

    public function signUp()
    {
        $this->mount();
        $this->signIn = false;
        $this->signUp = true;
    }

    public function forgotPassword()
    {
        $this->mount();
        $this->signIn = false;
        $this->signUp = false;
        $this->forgotPassword = true;
    }

    public function updatedUserEmail()
    {
        $this->validateOnly('user.email');
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
        $registrationDetails = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $this->user = User::query()->create($registrationDetails);

        event(new Registered($this->user));

        auth()->login($this->user);

        $this->emit('refreshComponent');

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
