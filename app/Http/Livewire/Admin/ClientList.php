<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserInformation;
use Filament\Forms\Components\Grid;
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

class ClientList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $print_modal = false;
    public $date_from, $date_to;

    protected function getTableQuery(): Builder
    {
        return User::query()->where('user_type', 'client');
    }



    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('FULLNAME')->searchable(),
            Tables\Columns\TextColumn::make('email')->label('EMAIL')->searchable(),
        ];
    }

    protected function getTableHeaderActions()
    {
        return [

            Action::make('export')->label('PRINT REPORT')->button()->color('success')->icon('heroicon-o-printer')->action(
                function () {
                    $this->print_modal = true;
                }
            )
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make()->form(
                function ($record) {
                    return [
                        Grid::make(2)
                            ->schema([
                                TextInput::make('firstname')->required()->placeholder($record->user_information->firstname),
                                TextInput::make('middlename')->required()->placeholder($record->user_information->middlename),
                                TextInput::make('lastname')->required()->placeholder($record->user_information->lastname),
                                TextInput::make('contact')->required()->numeric()->placeholder($record->user_information->contact_number),
                            ]),
                        TextInput::make('address')->required()->placeholder($record->user_information->address),
                    ];
                }
            ),
            Tables\Actions\EditAction::make('edit')->color('success')->action(
                function ($record, $data) {
                    $record->user_information->update([
                        'firstname' => $data['firstname'] != null ? $data['firstname'] : $record->user_information->firstname,
                        'middlename' => $data['middlename'] != null ? $data['middlename'] : $record->user_information->middlename,
                        'lastname' => $data['lastname'] != null ? $data['lastname'] : $record->user_information->lastname,
                        'contact_number' => $data['contact'] != null ? $data['contact'] : $record->user_information->contact_number,
                        'address' => $data['address'] != null ? $data['address'] : $record->user_information->address,
                    ]);
                    sweetalert()->success('Info Updated.');
                }
            )->form(
                    function ($record) {
                        return [
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('firstname')->placeholder($record->user_information->firstname),
                                    TextInput::make('middlename')->placeholder($record->user_information->middlename),
                                    TextInput::make('lastname')->placeholder($record->user_information->lastname),
                                    TextInput::make('contact')->numeric()->placeholder($record->user_information->contact_number),
                                ]),
                            TextInput::make('address')->placeholder($record->user_information->address),
                        ];
                    }
                ),
            Tables\Actions\DeleteAction::make(),
        ];
    }



    public function render()
    {
        return view('livewire.admin.client-list', [
            'clients' => UserInformation::when($this->date_from, function ($record) {
                $record->whereBetween('created_at', [$this->date_from, $this->date_to]);
            })->get(),
        ]);
    }
}
