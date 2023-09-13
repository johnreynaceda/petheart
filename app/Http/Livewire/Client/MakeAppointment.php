<?php

namespace App\Http\Livewire\Client;

use App\Models\ClientAppointment;
use App\Models\Doctor;
use App\Models\Pets;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Textarea;

class MakeAppointment extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $appointment_modal = false;
    public $pet_id, $appointment_date, $description, $doctor_id;

    public $events = [];

    protected $listeners = ['updateCalendar' => 'render'];

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
        return view('livewire.client.make-appointment', [
            'pets' => Pets::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('doctor_id')
                ->label('Doctor')
                ->options(Doctor::pluck('fullname', 'id'))->reactive()
                ->searchable(),

            Fieldset::make('APPOINTMENT INFORMATION')
                ->schema([
                    Select::make('pet_id')
                        ->label('Pet')
                        ->options(Pets::where('user_id', auth()->user()->id)->pluck('name', 'id'))
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
        ClientAppointment::create([
            'pet_id' => $this->pet_id,
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $this->appointment_date,
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);

        $this->appointment_modal = false;

        sweetalert()->addSuccess('Appointment has been submitted');
        return redirect()->route('client.dashboard');
    }
    public function updatedDoctorId()
    {
        $this->loadEvents();
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