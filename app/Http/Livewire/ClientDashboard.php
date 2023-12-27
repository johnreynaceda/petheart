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

class ClientDashboard extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use WithFileUploads;

    public $lastname, $firstname, $middlename, $contact, $address, $profile;
    public $information_modal;

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    TextInput::make('firstname')->required(),
                    TextInput::make('middlename')->required(),
                    TextInput::make('lastname')->required(),
                    TextInput::make('contact')->required()->numeric()->mask(fn(TextInput\Mask $mask) => $mask->pattern('00000000000')),
                ]),
            TextInput::make('address')->required(),
            FileUpload::make('profile')->label('Profile Photo')
        ];
    }

    public function mount()
    {
        $data = UserInformation::where('user_id', auth()->user()->id)->get()->count();
        if ($data == 0) {
            $this->information_modal = true;
        } else {
            $this->information_modal = false;
        }
    }

    public function submitRecord()
    {

        $this->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'address' => 'required',
            'contact' => 'required|digits:11',
            'profile' => 'required',
            'middlename' => 'required',
        ]);

        foreach ($this->profile as $key => $value) {
            UserInformation::create([
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'lastname' => $this->lastname,
                'contact_number' => $this->contact,
                'address' => $this->address,
                'user_id' => auth()->user()->id,
            ]);

            auth()->user()->update([
                'profile_path' => $value->store('Profile', 'public'),
            ]);
            Notification::make()
                ->title('Submit successfully')
                ->success()
                ->send();

            return redirect()->route('client.dashboard');

        }
    }

    public function render()
    {

        return view('livewire.client-dashboard');
    }
}
