<?php

namespace App\Http\Livewire;

use App\Models\BloodPressure;
use App\Models\Patient;
use Livewire\Component;

class CreateBloodPressure extends Component
{
    public $blood_pressure = '';
    public $patient_id = '';
    public $patient_number = '';

    protected $rules = [
        'blood_pressure' => 'required',
    ];

    public function mount(Patient $patient)
    {
        $this->patient_number = $patient->patient_number;
        $this->patient_id = $patient->id;
    }

    public function create() 
    {
        $this->validate();

        $patient = Patient::findOrFail($this->patient_id);

        $patient->bloodPressures()->create(['blood_pressure'=>$this->blood_pressure]);

        redirect(route('pressures.list',$patient));

    }

    public function render()
    {
        return view('livewire.create-blood-pressure');
    }
}
