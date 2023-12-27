<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    public function medicine_category()
    {
        return $this->belongsTo(MedicineCategory::class);
    }
}
