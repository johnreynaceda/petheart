<?php

namespace App\Http\Livewire;

use App\Models\UserInformation;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;

class UserProfile extends Component implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;
    use WithFileUploads;

    public $email, $name, $address, $contact, $profile;

    protected function getFormSchema(): array
    {
        return [
            Grid::make(1)
                ->schema([
                    TextInput::make('name')->placeholder(auth()->user()->name),
                    TextInput::make('email')->email()->placeholder(auth()->user()->email)->disabled(),

                ]),
            TextInput::make('contact')->placeholder(auth()->user()->user_information->contact_number ?? '')->disabled()->visible(auth()->user()->user_type == 'Client'),
            TextInput::make('address')->placeholder(auth()->user()->user_information->address ?? '')->visible(auth()->user()->user_type == 'Client'),
            FileUpload::make('profile')->label('Profile Photo')
        ];
    }

    public function saveRecord()
    {


        if ($this->profile) {
            foreach ($this->profile as $key => $value) {
                auth()->user()->update([
                    'email' => $this->email ? $this->email : auth()->user()->email,
                    'name' => $this->name ? $this->name : auth()->user()->name,
                    'profile_path' => $this->profile ? $value->store('Profile', 'public') : auth()->user()->profile_path,
                ]);

                $data = UserInformation::where('user_id', auth()->user()->id)->first();
                $data->update([
                    'contact_number' => $this->contact ? $this->contact : auth()->user()->user_information->contact_number,
                    'address' => $this->address ? $this->address : auth()->user()->user_information->address,
                ]);


            }
            sweetalert()->addSuccess('Your profile has been Up');
        } else {
            auth()->user()->update([
                'email' => $this->email ? $this->email : auth()->user()->email,
                'name' => $this->name ? $this->name : auth()->user()->name,
            ]);

            $data = UserInformation::where('user_id', auth()->user()->id)->first();
            $data->update([
                'contact_number' => $this->contact ? $this->contact : auth()->user()->user_information->contact_number,
                'address' => $this->address ? $this->address : auth()->user()->user_information->address,
            ]);
            sweetalert()->addSuccess('Your profile has been Up');
        }
        return redirect()->route('client.dashboard');

    }


    public function render()
    {
        return view('livewire.user-profile');
    }
}
