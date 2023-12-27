<?php

namespace App\Http\Livewire\Admin;

use App\Models\ClientAppointment;
use App\Models\MedicineCategory;
use App\Models\Pets;
use App\Models\ServiceTransaction;
use Carbon\Carbon;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
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

class AppointmentList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return ClientAppointment::query()->orderBy('created_at', 'DESC');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.name')->label('CLIENT NAME')->searchable(),
            Tables\Columns\TextColumn::make('pet')->label('PET NAME')->searchable()->formatStateUsing(
                function ($record) {
                    return Pets::where('id', $record->pet_id)->first()->name;
                }
            ),
            Tables\Columns\TextColumn::make('doctor.fullname')->label('DOCTOR NAME')->searchable(),
            Tables\Columns\TextColumn::make('appointment_date')->date('F d, Y h:i A')->label('APPOINTMENT DATE')->searchable(),
            BadgeColumn::make('status')->label('STATUS')
                ->enum([
                    'approved' => 'Approved',
                    'pending' => 'Pending',
                    'declined' => 'Declined',
                    'request' => 'Request for Cancellation',
                    'cancelled' => 'Cancelled',
                ])->colors([
                        'success' => 'approved',
                        'primary' => 'request',
                        'warning' => 'pending',
                        'danger' => 'declined'
                    ])->icon('heroicon-o-flag'),
            Tables\Columns\TextColumn::make('created_at')->date('F d, Y ')->label('CREATED AT')->searchable(),

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                ViewAction::make('view')->color('warning')->visible(
                    function ($record) {
                        return $record->status != 'request' || $record->status == 'declined';
                    }
                )->form(
                        function ($record) {
                            return [
                                Grid::make(2)->schema([
                                    TextInput::make('client_name')->placeholder($record->user->name),
                                    TextInput::make('pet_name')->placeholder(Pets::where('id', $record->pet_id)->first()->name),
                                    TextInput::make('doctor_name')->placeholder($record->doctor->fullname),
                                    TextInput::make('appointment_date')->placeholder(Carbon::parse($record->appointment_date)->format('F d, Y ')),
                                    TextInput::make('description')->placeholder($record->description),
                                    TextInput::make('service')->placeholder(ServiceTransaction::where('client_appointment_id', $record->id)->first()->service->name),
                                    TextInput::make('status')->placeholder($record->status),
                                ]),
                            ];
                        }
                    ),
                Action::make('approve')->label('Approve Appointment')->color('success')->icon('heroicon-o-thumb-up')->visible(
                    function ($record) {
                        return $record->status == 'pending';
                    }
                )->action(
                        function ($record) {
                            $record->update([
                                'status' => 'approved'
                            ]);
                            \App\Models\Notification::create([
                                'receiver_id' => $record->user_id,
                                'description' => 'Your appointment on ' . Carbon::parse($record->appointment_date)->format('F d, Y') . ' has been approved',
                            ]);

                            toastr()->addSuccess('Appointments have been approved');
                        }
                    ),
                Action::make('decline')->label('Decline Appointment')->color('danger')->icon('heroicon-o-thumb-down')->visible(
                    function ($record) {
                        return $record->status == 'pending';
                    }
                )->action(
                        function ($record) {
                            $record->update([
                                'status' => 'declined'
                            ]);
                            \App\Models\Notification::create([
                                'receiver_id' => $record->user_id,
                                'description' => 'Your appointment on ' . Carbon::parse($record->appointment_date)->format('F d, Y') . ' has been declined',
                            ]);

                            toastr()->addSuccess('Appointments have been declined');
                        }
                    ),
                Action::make('cancel')->label('Approve Cancellation')->color('success')->icon('heroicon-o-thumb-up')->visible(
                    function ($record) {
                        return $record->status == 'request';
                    }
                )->action(
                        function ($record) {
                            $record->update([
                                'status' => 'cancelled'
                            ]);

                            \App\Models\Notification::create([
                                'receiver_id' => $record->user_id,
                                'description' => 'Your request on cancellation of appointment on ' . Carbon::parse($record->appointment_date)->format('F d, Y') . ' has been approved. ',
                            ]);
                            toastr()->addSuccess('Appointments have been cancelled');
                        }
                    )
            ])
        ];
    }


    public function render()
    {
        return view('livewire.admin.appointment-list');
    }
}
