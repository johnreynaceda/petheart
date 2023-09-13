<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Medicine;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ViewColumn;
use Filament\Notifications\Notification;

class Inventory extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Medicine::query();
    }

    protected function getTableColumns(): array
    {
        return [
            ViewColumn::make('status')->label('NAME')->view('admin.filament.medicine')->searchable('name'),
            Tables\Columns\TextColumn::make('category')->label('CATEGORY')->searchable(),
            Tables\Columns\TextColumn::make('total_stocks')->label('TOTAL STOCKS')->searchable()->formatStateUsing(
                function ($record) {
                    return $record->total_stocks . ' ' . $record->stock_as_whole;
                }
            ),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('add_stocks')->label('ADD STOCKS')->button()->color('success')->icon('heroicon-o-plus-circle')->action(function ($record, $data) {
                $record->update([
                    'total_stocks' => $record->total_stocks + $data['stock'],
                ]);

                Notification::make()
                    ->title('Inventory Added Successfully')
                    ->success()
                    ->send();
            })->form(function ($record) {
            return [
                TextInput::make('stock')->required(),
            ];
        })->modalWidth('md'),
        ];
    }

    public function render()
    {
        return view('livewire.admin.inventory');
    }
}