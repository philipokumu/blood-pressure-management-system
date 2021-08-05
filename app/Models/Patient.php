<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        parent::boot();
        
        static::created(function ($model) {

            $model->patient_number = '#' . str_pad($model->id, 6, "0", STR_PAD_LEFT);
            $model->save();
        });
    }

    public function bloodPressures()
    {
       return $this->hasMany(BloodPressure::class);
    }
}
