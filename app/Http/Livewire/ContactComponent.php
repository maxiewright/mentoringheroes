<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{

    Public Contact $contact;


    protected $rules = [
        'contact.name' => 'required',
        'contact.phone' => 'nullable||required_without:email',
        'contact.email' => 'nullable|required_without:phone|email',
        'contact.details' => 'required',
    ];

    protected $messages = [
        'contact.name.required' => 'Please provide your name',
        'contact.phone.required_without' => 'Please provide and phone or email',
        'contact.email.required_without' => 'Please provide and phone or email',
        'contact.email.email' => 'Please enter a valid email address',
        'contact.details.required' => 'Please let us know briefly how we can help',
    ];

    public function mount()
    {
       $this->contact = Contact::make();
    }


    public function updatedContact()
    {
        $this->validateOnly($this->contact);
    }

    public function store()
    {
        $this->validate();

        $this->contact->save();

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
