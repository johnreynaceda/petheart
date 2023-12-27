<?php

namespace App\Http\Livewire\Admin\Consultation;

use App\Models\ClientAppointment;
use App\Models\Service;
use App\Models\ServiceTransaction;
use Livewire\Component;
use App\Models\Medicine;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ViewColumn;
use Filament\Notifications\Notification;

class Manage extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return ServiceTransaction::query()->where('client_appointment_id', $this->appointment_id);
    }

    public $appointment_id;
    public $appointment_data = [];
    public $active_page = 'consultation';

    public function mount()
    {
        $this->appointment_id = request('id');
        $this->appointment_data = ClientAppointment::where('id', $this->appointment_id)->first();
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new medicine')->label('Add Services')->icon('heroicon-o-plus-circle')->button()->size('md')
                ->action(function ($record, $data) {
                    ServiceTransaction::create([
                        'client_appointment_id' => $this->appointment_id,
                        'service_id' => $data['service_id'],

                    ]);
                })->form(
                    [
                        Fieldset::make('SERVICE INFORMATION')
                            ->schema([
                                Select::make('service_id')
                                    ->label('SERVICE')
                                    ->options(Service::all()->pluck('name', 'id'))
                                    ->searchable()
                            ])
                            ->columns(1)
                    ],
                )->modalWidth('2xl')->modalHeading('ADD SERVICE'),
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('service.name')->label('SERVICE NAME')->searchable(),
            Tables\Columns\TextColumn::make('service.price')->formatStateUsing(
                function ($record) {
                    return '₱' . number_format($record->service->price, 2);
                }
            )->label('SERVICE NAME')->searchable(),

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\DeleteAction::make(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.consultation.manage');
    }
}