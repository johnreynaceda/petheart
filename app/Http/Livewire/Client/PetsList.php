<?php

namespace App\Http\Livewire\Client;

use App\Models\ClientAppointment;
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

class PetsList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;

    public $attachment = [];
    public $pet_details = false;
    public $pet_data = [];

    public $pet_id;
    public $add_modal = false;
    public $edit_modal = false;
    public $name, $species, $breed, $color, $gender, $weight;

    protected function getTableQuery(): Builder
    {
        return Pets::query()->where('user_id', auth()->user()->id);
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
                    TextInput::make('name')->required()->placeholder($this->pet_data != null ? $this->pet_data->name : ''),
                    TextInput::make('species')->required()->placeholder($this->pet_data != null ? $this->pet_data->species : ''),
                    TextInput::make('breed')->required()->placeholder($this->pet_data != null ? $this->pet_data->breed : ''),
                    TextInput::make('color')->required()->placeholder($this->pet_data != null ? $this->pet_data->color : ''),
                    Select::make('gender')->label('Gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ])->placeholder($this->pet_data != null ? $this->pet_data->gender : ''),
                    TextInput::make('weight')->required()->numeric()->placeholder($this->pet_data != null ? $this->pet_data->weight : ''),
                    // ViewField::make('pic')->view('filament.fileupload')->columnSpan(2),
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

    public function updateRecord()
    {
        $data = Pets::where('id', $this->pet_data->id)->first();
        if ($this->attachment != null) {
            foreach ($this->attachment as $key => $item) {
                $data->update([
                    'name' => $this->name,
                    'breed' => $this->breed,
                    'species' => $this->species,
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

                $this->edit_modal = false;
            }
        }
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('history')->icon('heroicon-o-clock')->color('warning')->action(
                function ($record) {
                    $this->pet_id = $record->id;
                    $this->pet_data = Pets::where('id', $record->id)->first();
                    $this->pet_details = true;
                }
            ),
            Tables\Actions\Action::make('edit')->icon('heroicon-o-pencil-alt')->color('success')->action(function ($record, $data) {

                $this->pet_data = $record;
                $this->edit_modal = true;
                // $record->update([
                //     'name' => $data['name'],
                //     'species' => $data['species'],
                //     'breed' => $data['breed'],
                //     'color' => $data['color'],
                //     'gender' => $data['gender'],
                //     'weight' => $data['weight'],
                // ]);
                // Notification::make()
                //     ->title('Updated successfully')
                //     ->success()
                //     ->send();
            })->modalHeading('Edit Pet'),
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
        return view('livewire.client.pets-list', [
            'appointments' => ClientAppointment::where('pet_id', $this->pet_id)->get(),
        ]);
    }
}
