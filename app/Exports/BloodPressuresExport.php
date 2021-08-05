<?php

namespace App\Exports;

use App\Models\BloodPressure;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class BloodPressuresExport implements FromQuery
{

    public function __construct($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function query()
    {
        return BloodPressure::query()
        ->where('patient_id',$this->patient_id);
    }
}
