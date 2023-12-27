<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
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

class ServiceList extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;

    public $print_modal = false;
    public $date_from, $date_to;

    protected function getTableQuery(): Builder
    {
        return Service::query();
    }
    public function render()
    {
        return view('livewire.admin.service-list', [
            'services' => Service::when($this->date_from, function ($record) {
                $record->whereBetween('created_at', [$this->date_from, $this->date_to]);
            })->get(),
        ]);
    }
    protected function getTableColumns(): array
    {
        return [



            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('price')->label('PRICE')->formatStateUsing(
                function ($record) {
                    return '₱' . number_format($record->price, 2);
                }
            )->searchable(),
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new medicine')->label('New Service')->icon('heroicon-o-plus-circle')->button()->size('md')
                ->action(function ($record, $data) {
                    Service::create([
                        'name' => $data['name'],
                        'price' => $data['price'],
                    ]);
                })->form(
                    [
                        Fieldset::make('SERVICE INFORMATION')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('price')->required()->numeric(),
                            ])
                            ->columns(2)
                    ],
                )->modalWidth('2xl'),
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
            Tables\Actions\EditAction::make()->color('success')->action(
                function ($record, $data) {
                    $record->update([
                        'name' => $data['name'],
                        'price' => $data['price'],
                    ]);
                }
            )->form([
                        Fieldset::make('UPDATE SERVICE INFORMATION')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('price')->required()->numeric(),
                            ])
                            ->columns(2)
                    ])->modalWidth('2xl'),
            Tables\Actions\DeleteAction::make(),
        ];
    }

}
