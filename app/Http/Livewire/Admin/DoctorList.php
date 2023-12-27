<?php

namespace App\Http\Livewire\Admin;

use App\Models\ClientAppointment;
use Filament\Forms\Components\Grid;
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
use Closure;
use Filament\Forms\Get;

class DoctorList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $print_modal = false;
    public $date_from, $date_to;

    public $contact_number;

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
            Tables\Actions\EditAction::make('edit')->color('success')->form(
                function ($record) {
                    return [
                        Grid::make(2)
                            ->schema([
                                TextInput::make('fullname')->placeholder($record->fullname),
                                TextInput::make('contact_number')->placeholder($record->contact_number)->numeric()->mask(fn(TextInput\Mask $mask) => $mask->pattern('00000000000')),
                                TextInput::make('address')->placeholder($record->address),
                            ]),
                    ];
                }
            ),
            Tables\Actions\DeleteAction::make('delete')->action(
                function ($record) {
                    $data = ClientAppointment::where('doctor_id', $record->id)->count();

                    if ($data > 0) {
                        sweetalert()->addError('This Doctor have an appointment in the database, Delete Method is not allowed');
                    } else {
                        return $record->delete();
                    }
                }
            )
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
                                TextInput::make('contact_number')->required()->numeric()->mask(fn(TextInput\Mask $mask) => $mask->pattern('00000000000'))->rules([
                                    function () {
                                        return function (string $attribute, $value, Closure $fail) {
                                            if (strlen($value) != 11) {
                                                $fail('The :attribute is invalid.');
                                            }
                                        };
                                    },
                                ]),
                                TextInput::make('address')->required(),
                            ])
                            ->columns(2)
                    ],
                ),

            Action::make('export')->label('PRINT REPORT')->button()->color('success')->icon('heroicon-o-printer')->action(
                function () {
                    $this->print_modal = true;
                }
            )
        ];
    }

    public function render()
    {
        return view('livewire.admin.doctor-list', [
            'doctors' => Doctor::when($this->date_from, function ($record) {
                $record->whereBetween('created_at', [$this->date_from, $this->date_to]);
            })->get(),
        ]);
    }
}
