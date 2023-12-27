<?php

namespace App\Http\Livewire\Client;

use App\Models\ClientAppointment;
use App\Models\Prescription;
use App\Models\ServiceTransaction;
use App\Models\TreamentPlan;
use Livewire\Component;
use Filament\Tables;
use App\Models\Pets;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ViewColumn;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Livewire\WithFileUploads;
use Filament\Forms\Components\ViewField;

class Billing extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;

    public $invoice_modal = false;
    public $prescription_data = [];
    public $appointment_data = [];
    public $services_data = [];

    public $plan_modal = false;

    public $pet_data = [];
    public $plan_data = [];

    protected function getTableQuery(): Builder
    {
        return ClientAppointment::query()->where('user_id', auth()->user()->id);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('doctor.fullname')->label('DOCTOR NAME')->searchable(),
            Tables\Columns\TextColumn::make('peT')->label('PET')->searchable()->formatStateUsing(
                function ($record) {
                    return Pets::find($record->pet_id)->name;
                }
            ),
            Tables\Columns\TextColumn::make('description')->label('DESCRIPTION')->searchable(),
            Tables\Columns\TextColumn::make('appointment_date')->label('APPOINTMENT DATE')->date()->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [

            Tables\Actions\Action::make('plan')->label('Treatment Plan')->button()->color('gray')->icon('heroicon-o-document-text')->action(
                function ($record) {
                    $this->prescription_data = Prescription::where('client_appointment_id', $record->id)->get();
                    $this->pet_data = Pets::where('id', $record->pet_id)->first();
                    $this->appointment_data = ClientAppointment::where('id', $record->id)->first();
                    $this->plan_data = TreamentPlan::where('client_appointment_id', $record->id)->get();
                    $this->plan_modal = true;
                }
            ),
            Tables\Actions\Action::make('billing')->label('Billing')->button()->color('success')->icon('heroicon-o-credit-card')->action(
                function ($record) {
                    $this->appointment_data = ClientAppointment::where('id', $record->id)->first();
                    $this->prescription_data = Prescription::where('client_appointment_id', $record->id)->get();

                    $this->services_data = ServiceTransaction::where('client_appointment_id', $record->id)->get();
                    $this->invoice_modal = true;
                }
            ),
        ];
    }

    public function render()
    {
        return view('livewire.client.billing');
    }
}
