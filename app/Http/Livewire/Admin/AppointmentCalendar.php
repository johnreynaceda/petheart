<?php

namespace App\Http\Livewire\Admin;

use App\Models\ClientAppointment;
use App\Models\Pets;
use Livewire\Component;

class AppointmentCalendar extends Component
{
    public $events = [];
    public $event_data;
    public $event_modal = false;

    protected $listeners = ['eventClick' => 'test'];

    public function render()
    {
        $this->events = ClientAppointment::where('status', 'approved')->get()->map(
            function ($appointment) {
                return [
                    'id' => $appointment->id,
                    'Doctor' => $appointment->doctor->fullname,
                    'Patient' => strtoupper($appointment->user->name),
                    'Description' => $appointment->description,
                    'start' => $appointment->appointment_date,
                    'end' => $appointment->appointment_date,
                    'title' => strtoupper($appointment->user->name) . ' - ' . strtoupper($appointment->doctor->fullname),
                ];
            }
        )->tojson();

        return view('livewire.admin.appointment-calendar', [
            'appointments' => ClientAppointment::where('status', 'pending')->get(),
        ]);
    }

    public function approveAppointment($id)
    {

        $data = ClientAppointment::where('id', $id)->first();

        $data->update([
            'status' => 'approved',
        ]);
        toastr()->addSuccess('Appointments have been approved');
        return redirect()->route('admin.calendar');

    }

    public function test($data)
    {

        $this->event_data = $data;
        $this->event_modal = true;
    }


}