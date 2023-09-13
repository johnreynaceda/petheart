<?php

namespace App\Http\Livewire\Client;

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

class PetsList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;

    public $attachment = [];
    public $add_modal = false;
    public $edit_modal = false;
    public $name, $species, $breed, $color, $gender, $weight;

    protected function getTableQuery(): Builder
    {
        return Pets::query();
    }

    protected function getTableContentGrid(): ?array
    {
        return [
            'md' => 3,
            'xl' => 4,
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Fieldset::make('PETS INFORMATION')
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('species')->required(),
                    TextInput::make('breed')->required(),
                    TextInput::make('color')->required()->numeric(),
                    Select::make('gender')->label('Gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]),
                    TextInput::make('weight')->required()->numeric(),
                    FileUpload::make('attachment')->label('Photo')->image()->reactive()
                ])
                ->columns(2)
        ];
    }


    public function submitRecord()
    {
        $this->validate([
            'name' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'color' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'attachment' => 'required',
        ]);

        foreach ($this->attachment as $key => $item) {
            Pets::create([
                'name' => $this->name,
                'breed' => $this->breed,
                'species' => $this->species,
                'user_id' => auth()->user()->id,
                'color' => $this->color,
                'gender' => $this->gender,
                'weight' => $this->weight,
                'photo_path' => $item->store('Pets', 'public'),
            ]);
            Notification::make()
                ->title('Added successfully')
                ->success()
                ->send();

            $this->reset('name', 'species', 'breed', 'color', 'weight', 'attachment');

            $this->add_modal = false;
        }
    }

    protected function getTableColumns(): array
    {
        return [
            ViewColumn::make('status')->label('NAME')->view('client.filament.pets')->searchable('name'),
            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('species')->label('SPECIES')->searchable()->formatStateUsing(
                function ($record) {
                    return '(' . $record->species . ')';
                }
            ),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')->icon('heroicon-o-eye')->color('warning'),
            Tables\Actions\Action::make('edit')->icon('heroicon-o-pencil-alt')->color('success')->action(function ($record, $data) {
                $record->update([
                    'name' => $data['name'],
                    'species' => $data['species'],
                    'breed' => $data['breed'],
                    'color' => $data['color'],
                    'gender' => $data['gender'],
                    'weight' => $data['weight'],
                ]);
                Notification::make()
                    ->title('Updated successfully')
                    ->success()
                    ->send();
            })->form(
                    function ($record) {
                        return [
                            Fieldset::make('PETS INFORMATION')
                                ->schema([
                                    TextInput::make('name')->required()->default($record->name),
                                    TextInput::make('species')->required()->default($record->species),
                                    TextInput::make('breed')->required()->default($record->breed),
                                    TextInput::make('color')->required()->numeric()->default($record->color),
                                    Select::make('gender')->label('Gender')
                                        ->options([
                                            'Male' => 'Male',
                                            'Female' => 'Female',
                                        ])->default($record->gender),
                                    TextInput::make('weight')->required()->numeric()->default($record->weight),

                                ])
                                ->columns(2)
                        ];
                    }
                )->modalHeading('Edit Pet'),
            Tables\Actions\DeleteAction::make('delete')
        ];
    }

    // protected function getTableHeaderActions()
    // {
    //     return [
    //         Action::make('new pets')->label('New Pets')->icon('heroicon-o-plus-circle')->button()->size('md')
    //             ->action(function ($record, $data) {
    //                 dd($data['attachment']);
    //                 foreach ($this->attachment as $key => $item) {
    //                     Pets::create([
    //                         'user_id' => auth()->user()->id,
    //                         'name' => $data['name'],
    //                         'species' => $data['species'],
    //                         'breed' => $data['breed'],
    //                         'color' => $data['color'],
    //                         'gender' => $data['gender'],
    //                         'weight' => $data['weight'],
    //                         'photo_path' => $item->store('Pets', 'public'),
    //                     ]);
    //                 }
    //                 Notification::make()
    //                     ->title('Added successfully')
    //                     ->success()
    //                     ->send();
    //             })->form(
    //                 [

    //                 ],
    //             ),
    //     ];
    // }

    public function render()
    {
        return view('livewire.client.pets-list');
    }
}