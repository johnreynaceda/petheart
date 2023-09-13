<?php

namespace App\Http\Livewire\Admin;

use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Pets;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'pets' => Pets::whereDate('created_at', '<=', now())->whereDate('created_at', '>=', now()->subDays(2))->orderBy('created_at', 'desc')->get(),
            'clients_total' => User::where('user_type', 'client')->count(),
            'staffs' => Doctor::count(),
            'medicines' => Medicine::count(),
        ]);
    }
}