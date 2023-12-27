<?php

namespace App\Http\Livewire\Admin\Manage;

use App\Models\TreamentPlan;
use Filament\Tables\Actions\DeleteAction;
use Livewire\Component;
use App\Models\Doctor;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ViewColumn;
use Filament\Notifications\Notification;

class Diagnoses extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $appointment_id;
    protected function getTableQuery(): Builder
    {
        return TreamentPlan::query()->where('client_appointment_id', $this->appointment_id);
    }

    public function mount()
    {
        $this->appointment_id = request('id');
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new doctor')->label('ADD')->icon('heroicon-o-plus-circle')->button()->size('md')
                ->action(function ($record, $data) {
                    TreamentPlan::create([
                        'client_appointment_id' => $this->appointment_id,
                        'plan' => $data['plan'],
                    ]);
                    Notification::make()
                        ->title('Added successfully')
                        ->success()
                        ->send();
                })->form(
                    [
                        Fieldset::make('TREATMENT PLAN')
                            ->schema([
                                TextInput::make('plan')->required()
                            ])
                            ->columns(1)
                    ],
                )->modalWidth('2xl')->modalHeading('ADD TREATMENT PLAN'),
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('plan')->label('PLAN')->searchable(),
            Tables\Columns\TextColumn::make('created_at')->label('CREATED AT')->date()->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            DeleteAction::make('delete'),
        ];
    }


    public function render()
    {
        return view('livewire.admin.manage.diagnoses');
    }
}
