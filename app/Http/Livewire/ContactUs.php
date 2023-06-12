<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ContactUs extends Component {
    public string $name;
    public string $email;
    public string $phone;
    public string $comment;

    protected $rules = [
        'name'    => 'required',
        'email'   => 'required|email',
        'phone'   => 'required|numeric',
        'comment' => 'required',
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function sendMessage() {
        $this->validate();

        $contact          = new Contact();
        $contact->name    = $this->name;
        $contact->email   = $this->email;
        $contact->phone   = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();

        session()->flash('message', 'Thanks for contacting us. We will look into your matter quickly');

        return redirect('/contact-us');
    }
    public function render() {
        $settings = Setting::find(1);
        return view('livewire.contact-us', [
            'settings' => $settings,
        ]);
    }
}
