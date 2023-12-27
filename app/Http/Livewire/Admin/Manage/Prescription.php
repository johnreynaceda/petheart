<?php

namespace App\Http\Livewire\Admin\Manage;

use App\Models\Medicine;
use App\Models\TreamentPlan;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\DeleteAction;
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
use Filament\Forms\Components\Repeater;
use App\Models\Prescription as prescriptionModel;

class Prescription extends Component implements Tables\Contracts\HasTable
{
    public $appointment_id;

    use Tables\Concerns\InteractsWithTable;

    public function mount()
    {
        $this->appointment_id = request('id');
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new')->label('ADD')->icon('heroicon-o-plus-circle')->button()->size('md')
                ->action(function ($record, $data) {

                    foreach ($data['medicine'] as $key => $value) {

                        prescriptionModel::create([
                            'client_appointment_id' => $this->appointment_id,
                            'medicine_id' => $value['medicine_id'],
                            'quantity' => $value['quantity'],
                            'amount' => Medicine::where('id', $value['medicine_id'])->first()->price * $value['quantity'],
                            'description' => $value['description'],
                        ]);

                        $data = Medicine::where('id', $value['medicine_id'])->first();
                        $data->update([
                            'total_stocks' => $data->total_stocks - $value['quantity']
                        ]);
                    }
                    Notification::make()
                        ->title('Added successfully')
                        ->success()
                        ->send();
                })->form(
                    [
                        Repeater::make('medicine')->createItemButtonLabel('Add Medicine')
                            ->schema([
                                Select::make('medicine_id')
                                    ->label('Medicine')
                                    ->options(Medicine::pluck('name', 'id'))
                                    ->searchable(),
                                TextInput::make('quantity')->numeric(),
                                Textarea::make('description')->columnSpan(2)->required(),
                            ])
                            ->columns(2)
                    ],
                )->modalWidth('4xl')->modalHeading('ADD MEDICINE'),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return prescriptionModel::query()->where('client_appointment_id', $this->appointment_id);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('medicine.name')->label('MEDICINE')->searchable(),
            Tables\Columns\TextColumn::make('medicine.price')->label('PRICE')->searchable(),
            Tables\Columns\TextColumn::make('quantity')->label('QUANTITY')->searchable(),
            Tables\Columns\TextColumn::make('amount')->label('TOTAL AMOUNT')->formatStateUsing(
                function ($record) {
                    return '₱' . number_format($record->amount, 2);
                }
            )->searchable(),
        ];
    }

    protected function getTableActions()
    {
        return [
            DeleteAction::make('delete')->action(
                function ($record) {
                    $data = Medicine::where('id', $record->medicine_id)->first();

                    $data->update([
                        'total_stocks' => $record->quantity + $data->total_stocks,
                    ]);

                    $record->delete();
                }
            ),
        ];
    }

    public function render()
    {
        return view('livewire.admin.manage.prescription');
    }


}
