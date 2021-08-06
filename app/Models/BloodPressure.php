<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressure extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'blood_pressure',
        'patient_id',
    ];
}
