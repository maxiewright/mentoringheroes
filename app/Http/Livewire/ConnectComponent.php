<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConnectComponent extends Component
{

    public bool $signIn = false;
    public bool $emailConnect = false;


    public function render()
    {
        return view('livewire.connect-component');
    }
}
