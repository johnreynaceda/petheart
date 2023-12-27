<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Pets;
use App\Models\User;
use Livewire\Component;
use Filament\Tables;
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

class Dashboard extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;

    protected function getTableQuery(): Builder
    {
        return Pets::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')->label('OWNER')->searchable()->action(
                function () {
                    return redirect()->route('admin.clients');
                }
            ),
            Tables\Columns\TextColumn::make('name')->label('PET NAME')->searchable()->action(
                function () {
                    return redirect()->route('admin.animals');
                }
            ),
            Tables\Columns\TextColumn::make('breed')->label('BREED')->searchable(),
            Tables\Columns\TextColumn::make('created_at')->label('DATE')->date()->searchable(),

        ];
    }

    protected function getTableActions(): array
    {
        return [

            Tables\Actions\ViewAction::make('view')->color('warning')->form([
                Fieldset::make('PETS INFORMATION')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('species')->required(),
                        TextInput::make('breed')->required(),
                        TextInput::make('color')->required(),
                        Select::make('gender')->label('Gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ]),
                        TextInput::make('weight')->required()->numeric()
                        // ViewField::make('pic')->view('filament.fileupload')->columnSpan(2),
                    ])
                    ->columns(2)
            ])
        ];
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'pets' => Pets::whereDate('created_at', '<=', now())->whereDate('created_at', '>=', now()->subDays(2))->orderBy('created_at', 'desc')->get(),
            'clients_total' => User::where('user_type', 'client')->count(),
            'staffs' => Doctor::count(),
            'medicines' => Medicine::count(),
        ]);
    }
}
