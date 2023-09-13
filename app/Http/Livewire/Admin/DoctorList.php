<?php

namespace App\Http\Livewire\Admin;

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

class DoctorList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Doctor::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('fullname')->label('FULLNAME')->searchable(),
            Tables\Columns\TextColumn::make('contact_number')->label('CONTACT NUMBER')->searchable(),
            Tables\Columns\TextColumn::make('address')->label('ADDRESS')->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [

            Tables\Actions\DeleteAction::make('delete')
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new doctor')->label('New Doctor')->icon('heroicon-o-plus-circle')->button()->size('md')
                ->action(function ($record, $data) {
                    Doctor::create([
                        'fullname' => $data['firstname'] . ' ' . $data['middlename'][0] . '. ' . $data['lastname'],
                        'contact_number' => $data['contact_number'],
                        'address' => $data['address'],
                    ]);
                    Notification::make()
                        ->title('Added successfully')
                        ->success()
                        ->send();
                })->form(
                    [
                        Fieldset::make('DOCTOR INFORMATION')
                            ->schema([
                                TextInput::make('firstname')->required(),
                                TextInput::make('middlename')->required(),
                                TextInput::make('lastname')->required(),
                                TextInput::make('contact_number')->required()->numeric(),
                                TextInput::make('address')->required(),
                            ])
                            ->columns(2)
                    ],
                ),
        ];
    }

    public function render()
    {
        return view('livewire.admin.doctor-list');
    }
}