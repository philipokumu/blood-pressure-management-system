<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class CreatePatient extends Component
{
    public $name = '';

    protected $rules = [
        'name' => 'required|min:6',
    ];

    public function create()
    {   
        $this->validate();

        $patient = Patient::create(['name'=>$this->name]);

        redirect(route('patients.edit',$patient));

    }

    public function render()
    {
        return view('livewire.create-patient');
    }
}
