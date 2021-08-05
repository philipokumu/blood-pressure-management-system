<?php

namespace App\Http\Controllers;

use App\Exports\BloodPressuresExport;
use Illuminate\Http\Request;
use App\Models\Patient;
use Maatwebsite\Excel\Facades\Excel;

class PatientBloodPressureController extends Controller
{
    public function export($patient_id) 
    {
        $patient = Patient::findOrFail($patient_id);
        $documentName = 'bloodpressures_patient_'.$patient->patient_number.'.xlsx';
        return Excel::download(new BloodPressuresExport($patient_id), $documentName );
    }
}
