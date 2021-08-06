<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class UpdatePatient extends Component
{
    public $name = '';
    public $patient_number = '';
    public $patient_id = '';

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function mount(Patient $patient)
    {
        $this->name = $patient->name;
        $this->patient_number = $patient->patient_number;
        $this->patient_id = $patient->id;
    }

    public function update() 
    {   
        $this->validate();

        $patient = Patient::findOrFail($this->patient_id);

        $patient->update(['name'=>$this->name]);

        redirect(route('patients.list'));

    }

    public function render()
    {
        return view('livewire.update-patient');
    }
}
