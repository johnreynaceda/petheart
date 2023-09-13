<?php

namespace App\Http\Livewire\Client;

use App\Models\ClientAppointment;
use Livewire\Component;

class MyAppointment extends Component
{
    public function render()
    {
        return view('livewire.client.my-appointment', [
            'appointments' => ClientAppointment::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}