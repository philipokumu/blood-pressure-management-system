<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class AllPatients extends Component
{
    public $patients;

    public function mount()
    {
        $this->patients = Patient::all();
    }

    public function index()
    {

    }

    public function render()
    {
        return view('livewire.all-patients');
    }
}
