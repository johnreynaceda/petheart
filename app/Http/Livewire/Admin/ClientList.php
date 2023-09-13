<?php

namespace App\Http\Livewire\Admin;

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

    public function render()
    {
        return view('livewire.admin.client-list');
    }
}