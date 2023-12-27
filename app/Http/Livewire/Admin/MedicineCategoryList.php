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

class MedicineCategoryList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return MedicineCategory::query();
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new medicine')->label('New Category')->icon('heroicon-o-plus-circle')->button()->size('md')
                ->action(function ($record, $data) {
                    MedicineCategory::create([
                        'name' => $data['name'],
                    ]);
                    Notification::make()
                        ->title('Added successfully')
                        ->success()
                        ->send();
                })->form(
                    [
                        Fieldset::make('CATEGORY INFORMATION')
                            ->schema([
                                TextInput::make('name')->required(),
                            ])
                            ->columns(1)
                    ],
                ),
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make('edit')->color('success')->form(
                function ($record) {
                    return [
                        TextInput::make('name')->required()->default($record->name),
                    ];
                }
            )->modalWidth('xl'),
            // Tables\Actions\EditAction::make('edit')->icon('heroicon-o-pencil-alt')->color('success')->action(function ($record, $data) {
            //     $record->update([
            //         'name' => $data['name'],
            //         'serial_code' => $data['serial_code'],
            //         'description' => $data['description'],
            //         'category' => $data['category'],
            //         'price' => $data['price'],
            //         'stock_as_whole' => $data['as_whole'],
            //         'label_per_stock' => $data['per_stock'],
            //         'total_stocks' => $data['total_stocks']
            //     ]);
            //     Notification::make()
            //         ->title('Updated successfully')
            //         ->success()
            //         ->send();
            // })->form(
            //         function ($record) {
            //             return [
            //                 Fieldset::make('MEDICINE INFORMATION')
            //                     ->schema([
            //                         TextInput::make('name')->required()->default($record->name),
            //                         TextInput::make('serial_code')->required()->default($record->serial_code),
            //                         TextInput::make('description')->required()->default($record->description),
            //                         TextInput::make('price')->required()->numeric()->default($record->price),
            //                         Select::make('medicine_category.name')->label('Category')->default($record->category)
            //                             ->options([
            //                                 'Antibiotic' => 'Antibiotic',
            //                                 'reviewing' => 'Reviewing',
            //                                 'published' => 'Published',
            //                             ]),
            //                         TextInput::make('as_whole')->label('Stocks as whole')->required()->placeholder('boxes, bottles, etc.')->default($record->stock_as_whole),
            //                         TextInput::make('per_stock')->label('Label per Stocks')->required()->placeholder('ML, L, PCS, etc.')->default($record->label_per_stock),
            //                         TextInput::make('total_stocks')->required()->numeric()->default($record->total_stocks),
            //                     ])
            //                     ->columns(2)
            //             ];
            //         }
            //     )->modalHeading('Edit Medicine'),
            Tables\Actions\DeleteAction::make('delete')
        ];
    }

    public function render()
    {
        return view('livewire.admin.medicine-category-list');
    }
}
