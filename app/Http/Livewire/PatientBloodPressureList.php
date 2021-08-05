<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class PatientBloodPressureList extends Component
{
    public $state = [
        'patient_id' => '',
        'patient_number' => '',
    ];

    protected $rules = [
        'state.blood_pressure' => 'required',
    ];

    public function mount(Patient $patient)
    {
        $this->state['patient_id'] = $patient->id;
        $this->state['patient_number'] = $patient->patient_number;
    }

    public function render()
    {
        return view('livewire.patient-blood-pressure-list');
    }
}
