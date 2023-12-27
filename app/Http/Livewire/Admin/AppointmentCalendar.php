<?php

namespace App\Http\Livewire\Admin;

use App\Models\ClientAppointment;
use App\Models\Notification;
use App\Models\Pets;
use App\Models\ServiceTransaction;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentCalendar extends Component
{
    public $events = [];
    public $event_data;
    public $event_modal = false;
    public $view_modal = false;
    public $appointment_data;
    public $appointment_status = false;

    protected $listeners = ['eventClicked' => 'test'];

    public function render()
    {
        $this->events = ClientAppointment::whereIn('status', ['approved', 'request'])->get()->map(
            function ($appointment) {
                return [
                    'id' => $appointment->id,
                    'Doctor' => $appointment->doctor->fullname,
                    'Patient' => strtoupper(Pets::where('id', $appointment->pet_id)->first()->name),
                    'Description' => $appointment->description,
                    'Service' => ServiceTransaction::where('client_appointment_id', $appointment->id)->first()->service->name,
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
        Notification::create([
            'receiver_id' => $data->user_id,
            'description' => 'Your appointment on ' . Carbon::parse($data->appointment_date)->format('F d, Y') . ' has been approved',
        ]);

        toastr()->addSuccess('Appointments have been approved');
        return redirect()->route('admin.calendar');

    }

    public function open_modal($id)
    {
        $data = ClientAppointment::where('id', $id)->first();
        $this->appointment_data = $data;
        $this->appointment_status = true;
        $this->view_modal = true;

    }

    public function test($data)
    {

        $this->event_data = $data;
        $this->event_modal = true;
    }

    public function declineAppointment($id)
    {
        $data = ClientAppointment::where('id', $id)->first();

        $data->update([
            'status' => 'declined',
        ]);
        Notification::create([
            'receiver_id' => $data->user_id,
            'description' => 'Your appointment on ' . Carbon::parse($data->appointment_date)->format('F d, Y') . ' has been declined',
        ]);
        toastr()->addSuccess('Appointments have been declined');
        return redirect()->route('admin.calendar');
    }

    public function cancelAppointment($id)
    {
        $data = ClientAppointment::where('id', $id)->first();

        $data->update([
            'status' => 'request',
        ]);
        toastr()->addSuccess('Appointments have been declined');
        return redirect()->route('admin.calendar');
    }



}
