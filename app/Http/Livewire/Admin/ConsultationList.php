<?php

namespace App\Http\Livewire\Admin;

use App\Models\ClientAppointment;
use App\Models\Pets;
use App\Models\Prescription;
use App\Models\ServiceTransaction;
use App\Models\TreamentPlan;
use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ViewColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;

class ConsultationList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $invoice_modal = false;
    public $prescription_data = [];
    public $appointment_data = [];
    public $services_data = [];

    public $plan_modal = false;

    public $pet_data = [];
    public $plan_data = [];



    protected function getTableQuery(): Builder
    {
        return ClientAppointment::query()->where('status', 'approved')->orderBy('created_at', 'DESC');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')
                ->label('FULLNAME')->searchable(query: function (Builder $query, string $search): Builder {
                    return $query->whereHas('user', function ($record) use ($search) {
                        $record->where('name', 'like', '%' . $search . '%');
                    });
                }),
            Tables\Columns\TextColumn::make('user')->label('PET NAME')->formatStateUsing(
                function ($record) {
                    return Pets::where('id', $record->pet_id)->first()->name;
                }
            ),
            Tables\Columns\TextColumn::make('doctor.fullname')->label('DOCTOR')->searchable(query: function (Builder $query, string $search): Builder {
                return $query->whereHas('doctor', function ($record) use ($search) {
                    $record->where('fullname', 'like', '%' . $search . '%');
                });
            }),
            Tables\Columns\TextColumn::make('appointment_date')->date('F d, Y h:i A')->label('DATE')

        ];
    }
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('manage')->button()->action(
                function ($record) {
                    return redirect()->route('admin.consultation-manage', ['id' => $record->id]);
                },
            ),
            Tables\Actions\Action::make('plan')->label('Treatment Plan')->button()->color('gray')->icon('heroicon-o-document-text')->action(
                function ($record) {
                    $this->prescription_data = Prescription::where('client_appointment_id', $record->id)->get();
                    $this->pet_data = Pets::where('id', $record->pet_id)->first();
                    $this->appointment_data = ClientAppointment::where('id', $record->id)->first();
                    $this->plan_data = TreamentPlan::where('client_appointment_id', $record->id)->get();
                    $this->plan_modal = true;
                }
            ),
            Tables\Actions\Action::make('Billing')->button()->icon('heroicon-o-cash')->color('success')->action(
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
        return view('livewire.admin.consultation-list');
    }
}
