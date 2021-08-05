<?php

namespace Tests\Feature;

use App\Http\Livewire\AllPatients;
use App\Http\Livewire\CreatePatient;
use App\Http\Livewire\UpdatePatient;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_new_patient()
    {

        $this->assertDatabaseCount('patients',0);

        $name = 'foo bar';
        $patient_number = 56;

        Livewire::actingAs(User::factory()->create())
            ->test(CreatePatient::class)
            ->set('state', [
                'name' => $name,
                'patient_number' => $patient_number,
                ])
            ->call('create')
            ->assertRedirect(route('patients'));

            $patient = Patient::first();
            $nameFromDb = $patient->name;
            $patientNumberFromDb = $patient->patient_number;
    
            $this->assertEquals($name, $nameFromDb);
            $this->assertEquals($patient_number, $patientNumberFromDb);

        $this->assertDatabaseCount('patients',1);
        
    }


    public function test_user_can_update_patient_info()
    {

        $patientOldInfo = Patient::factory()->create();
        $newName = 'George';

        Livewire::actingAs(User::factory()->create())
            ->test(UpdatePatient::class,['id' => $patientOldInfo->id])
            ->set('state', [
                'name' => $newName,
                ])
            ->call('update',$patientOldInfo->id)
            ->assertRedirect(route('patients'));

            $patient = Patient::first();
            $nameFromDb = $patient->name;
            $patientNumberFromDb = $patient->patient_number;
    
            $this->assertEquals($newName, $nameFromDb);
            $this->assertEquals($patientOldInfo->patient_number, $patientNumberFromDb);
    }


    public function test_user_can_view_patient_list()
    {

        $patients = Patient::factory(2)->create();

        Livewire::actingAs(User::factory()->create())
            ->test(AllPatients::class,['patients' => $patients])
            // ->call('index')
            ->assertStatus(200);
    }

}
