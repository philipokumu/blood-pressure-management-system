<?php

namespace App\Http\Livewire;

use App\Models\BloodPressure;
use App\Models\Patient;
use Livewire\Component;

class UpdateBloodPressure extends Component
{
    public $bloodPressure_id = '';
    public $patient_id = '';
    public $patient_number = '';
    public $blood_pressure = '';

    protected $rules = [
        'blood_pressure' => 'required',
    ];

    public function mount(Patient $patient, BloodPressure $bloodPressure)
    {
        $this->bloodPressure_id = $bloodPressure->id;
        $this->blood_pressure = $bloodPressure->blood_pressure;
        $this->patient_id = $patient->id;
        $this->patient_number = $patient->patient_number;
    }

    public function update()
    {
        $this->validate();

        $bloodPressure = BloodPressure::findOrFail($this->bloodPressure_id);

        $bloodPressure->update(['blood_pressure'=>$this->blood_pressure]);

        redirect(route('pressures.list',$bloodPressure->patient_id));

    }

    public function render()
    {
        return view('livewire.update-blood-pressure');
    }
}
