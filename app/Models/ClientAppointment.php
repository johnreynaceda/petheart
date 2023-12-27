<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAppointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pets()
    {
        return $this->hasMany(Pets::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function treatment_plans()
    {
        return $this->hasMany(TreamentPlan::class);
    }

    public function service_transactions()
    {
        return $this->hasMany(ServiceTransaction::class);
    }
}
