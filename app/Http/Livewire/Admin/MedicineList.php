<?php

namespace App\Http\Livewire\Admin;

use App\Models\MedicineCategory;
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

class MedicineList extends Component implements Tables\Contracts\HasTable
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
            Tables\Columns\TextColumn::make('description')->label('DESCRIPTION')->searchable(),
            ViewColumn::make('stocks')->label('SIZE PER STOCKS')->view('admin.filament.stocks'),
            Tables\Columns\TextColumn::make('medicine_category.name')->label('CATEGORY')->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('edit')->icon('heroicon-o-pencil-alt')->color('success')->action(function ($record, $data) {
                $record->update([
                    'name' => $data['name'],
                    'serial_code' => $data['serial_code'],
                    'description' => $data['description'],
                    'category' => $data['category'],
                    'price' => $data['price'],
                    'stock_as_whole' => $data['as_whole'],
                    'label_per_stock' => $data['per_stock'],
                    'total_stocks' => $data['total_stocks']
                ]);
                Notification::make()
                    ->title('Updated successfully')
                    ->success()
                    ->send();
            })->form(
                    function ($record) {
                        return [
                            Fieldset::make('MEDICINE INFORMATION')
                                ->schema([
                                    TextInput::make('name')->required()->default($record->name),
                                    TextInput::make('serial_code')->required()->default($record->serial_code),
                                    TextInput::make('description')->required()->default($record->description),
                                    TextInput::make('price')->required()->numeric()->default($record->price),
                                    Select::make('medicine_category.name')->label('Category')->default($record->category)
                                        ->options([
                                            'Antibiotic' => 'Antibiotic',
                                            'reviewing' => 'Reviewing',
                                            'published' => 'Published',
                                        ]),
                                    TextInput::make('as_whole')->label('Stocks as whole')->required()->placeholder('boxes, bottles, etc.')->default($record->stock_as_whole)->disabled(),
                                    TextInput::make('per_stock')->label('Label per Stocks')->required()->placeholder('ML, L, PCS, etc.')->default($record->label_per_stock),
                                    TextInput::make('total_stocks')->required()->numeric()->default($record->total_stocks),
                                ])
                                ->columns(2)
                        ];
                    }
                )->modalHeading('Edit Medicine'),
            Tables\Actions\DeleteAction::make('delete')
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new medicine')->label('New Medicine')->icon('heroicon-o-plus-circle')->button()->size('md')
                ->action(function ($record, $data) {
                    Medicine::create([
                        'name' => $data['name'],
                        'serial_code' => $data['serial_code'],
                        'description' => $data['description'],
                        'medicine_category_id' => $data['category_id'],
                        'price' => $data['price'],
                        'stock_as_whole' => $data['as_whole'],
                        'label_per_stock' => $data['per_stock'],
                        'total_stocks' => $data['total_stocks']
                    ]);
                    Notification::make()
                        ->title('Added successfully')
                        ->success()
                        ->send();
                })->form(
                    [
                        Fieldset::make('MEDICINE INFORMATION')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('serial_code')->required(),
                                TextInput::make('description')->required(),
                                TextInput::make('price')->required()->numeric(),
                                Select::make('category_id')->label('Category')
                                    ->options(MedicineCategory::all()->pluck('name', 'id')),
                                TextInput::make('as_whole')->label('Stocks as whole')->required()->placeholder('boxes, bottles, etc.'),
                                TextInput::make('per_stock')->label('Label per Stocks')->required()->placeholder('ML, L, PCS, etc.'),
                                TextInput::make('total_stocks')->required()->numeric(),
                            ])
                            ->columns(2)
                    ],
                ),
        ];
    }

    public function render()
    {
        return view('livewire.admin.medicine-list');
    }


}
