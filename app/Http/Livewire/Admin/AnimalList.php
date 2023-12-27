<?php

namespace App\Http\Livewire\Admin;

use App\Models\ClientAppointment;
use App\Models\Pets;
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

class AnimalList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $view_records = false;
    public $pet_id;

    public $print_modal = false;
    public $date_from, $date_to;

    protected function getTableQuery(): Builder
    {
        return Pets::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('PET NAME')->searchable(),
            Tables\Columns\TextColumn::make('species')->label('SPECIES')->searchable(),
            Tables\Columns\TextColumn::make('breed')->label('BREED')->searchable(),
            Tables\Columns\TextColumn::make('color')->label('COLOR')->searchable(),
            Tables\Columns\TextColumn::make('gender')->label('GENDER')->searchable(),

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
            Tables\Actions\Action::make('view')->label('View Records')->icon('heroicon-o-eye')->color('warning')->action(
                function ($record) {
                    $this->pet_id = $record->id;
                    $this->view_records = true;
                }
            ),
            Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make()->color('success')->action(
                    function ($record, $data) {
                        $record->update([
                            'name' => $data['name'] != null ? $data['name'] : $record->name,
                            'breed' => $data['breed'] != null ? $data['breed'] : $record->breed,
                            'species' => $data['species'] != null ? $data['species'] : $record->species,
                            'color' => $data['color'] != null ? $data['color'] : $record->color,
                            'gender' => $data['gender'] != null ? $data['gender'] : $record->gender,
                        ]);
                        sweetalert()->addSuccess('Info Updated.');
                    }
                )->form(
                        function ($record) {
                            return [
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')->placeholder($record->name),
                                        TextInput::make('species')->placeholder($record->species),
                                        TextInput::make('breed')->placeholder($record->breed),
                                        TextInput::make('color')->placeholder($record->color),
                                        TextInput::make('gender')->placeholder($record->gender),
                                    ]),
                            ];
                        }
                    ),
                Tables\Actions\DeleteAction::make(),
            ]),

        ];
    }
    public function render()
    {
        return view('livewire.admin.animal-list', [
            'pets' => Pets::where('id', '=', $this->pet_id)->first(),
            'petss' => Pets::when($this->date_from, function ($record) {
                $record->whereBetween('created_at', [$this->date_from, $this->date_to]);
            })->get(),
            'appointments' => ClientAppointment::where('pet_id', $this->pet_id)->get(),
        ]);
    }
}
