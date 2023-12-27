<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\Contact as contactMail;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $firstname, $lastname, $email, $phone, $details;
    public function render()
    {
        return view('livewire.contact');
    }

    public function sendEmail()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'details' => 'required',
        ]);

        Mail::to('petheartveterinaryclinicandsup@gmail.com')->send(new contactMail($this->firstname, $this->lastname, $this->email, $this->phone, $this->details));
        sweetalert()->addSuccess('You Request has been sent');
        return redirect()->route('welcome');
    }
}
