<?php

namespace App\Http\Livewire;

use App\Models\BloodPressure;
use App\Models\Patient;
use Livewire\Component;

class DeleteBloodPressure extends Component
{
    public $state = [
        'blood_pressure' => '',
    ];

    public function destroy(Patient $patient, BloodPressure $bloodPressure)
    {
        $bloodPressure->delete();
    }

    public function render()
    {
        return view('livewire.delete-blood-pressure');
    }
}
