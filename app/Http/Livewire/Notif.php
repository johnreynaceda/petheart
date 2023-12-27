<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

class Notif extends Component
{
    public function render()
    {
        return view('livewire.notif', [
            'notifications' => Notification::where('receiver_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function read($id)
    {
        $data = Notification::where('id', $id)->first();
        $data->update([
            'is_read' => true,
        ]);

        return redirect()->route('client.appointments');
    }
}
