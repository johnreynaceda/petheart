<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pets;
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
    public function render()
    {
        return view('livewire.admin.animal-list');
    }
}