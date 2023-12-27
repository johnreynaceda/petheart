<?php

namespace App\Http\Livewire\Client;

use App\Models\ClientAppointment;
use Livewire\Component;
use App\Models\Doctor;
use App\Models\Pets;
use App\Models\Service;
use App\Models\ServiceTransaction;
use Carbon\Carbon;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Textarea;

class MyAppointment extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $appointment_modal = false;
    public $pet_id, $appointment_date, $description, $doctor_id, $service_id;

    public $events = [];
    public function render()
    {

        $this->events = ClientAppointment::where('status', 'approved')->get()->map(
            function ($appointment) {
                return [
                    'id' => $appointment->id,
                    'doctor' => $appointment->doctor->fullname,
                    'description' => $appointment->description,
                    'start' => $appointment->appointment_date,
                    'end' => $appointment->appointment_date,
                    'title' => $appointment->doctor->fullname,
                ];

            }
        )->tojson();

        return view('livewire.client.my-appointment', [
            'appointments' => ClientAppointment::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
            'pets' => Pets::where('user_id', auth()->user()->id)->get(),
            'doctors' => Doctor::all(),
            'services' => Service::all(),
        ]);


    }

    protected function getFormSchema(): array
    {
        return [
            // Select::make('doctor_id')
            //     ->label('Doctor')
            //     ->options(Doctor::pluck('fullname', 'id'))->reactive()
            //     ->searchable(),
            Fieldset::make('APPOINTMENT INFORMATION')
                ->schema([
                    Select::make('pet_id')
                        ->label('Pet')
                        ->options(Pets::where('user_id', auth()->user()->id)->pluck('name', 'id'))
                        ->searchable(),
                    Select::make('service_id')
                        ->label('Service')
                        ->options(Service::all()->pluck('name', 'id'))
                        ->searchable(),
                    DateTimePicker::make('appointment_date')->hoursStep(2)->reactive()
                        ->minutesStep(15)
                        ->secondsStep(10)->icon('heroicon-o-calendar')->withoutSeconds(),
                    Textarea::make('description')
                ])->columns(1)
        ];

    }

    public function submitAppointment()
    {
        $this->validate([
            'pet_id' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required',
            'description' => 'required',
        ]);
        $client = ClientAppointment::create([
            'pet_id' => $this->pet_id,
            'doctor_id' => $this->doctor_id,
            'appointment_date' => Carbon::parse($this->appointment_date),
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);

        ServiceTransaction::create([
            'client_appointment_id' => $client->id,
            'service_id' => $this->service_id,
        ]);

        $this->appointment_modal = false;

        sweetalert()->addSuccess('Appointment has been submitted');
        return redirect()->route('client.dashboard');
    }
    public function updatedDoctorId()
    {
        $this->loadEvents();
    }

    public function cancelAppointment($id)
    {

        $data = ClientAppointment::where('id', $id)->first();
        $data->update([
            'status' => 'request',
        ]);
        sweetalert()->addSuccess('Request has been sent');
    }

    public function loadEvents()
    {
        $this->events = ClientAppointment::where('status', 'approved')->where('doctor_id', $this->doctor_id)->get()->map(
            function ($appointment) {
                return [
                    'id' => $appointment->id,
                    'doctor' => $appointment->doctor->fullname,
                    'description' => $appointment->description,
                    'start' => $appointment->appointment_date,
                    'end' => $appointment->appointment_date,
                    'title' => $appointment->doctor->fullname,
                ];

            }
        )->tojson();
    }
}
