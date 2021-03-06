<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateBloodPressure;
use App\Http\Livewire\DeleteBloodPressure;
use App\Http\Livewire\PatientBloodPressureList;
use App\Http\Livewire\UpdateBloodPressure;
use App\Models\BloodPressure;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BloodPressureTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_record_new_blood_pressure_for_one_patient()
    {

        $this->assertDatabaseCount('blood_pressures',0);

        $patient = Patient::factory()->create(['id'=>56]);
        $blood_pressure_record = '120/80';

        Livewire::actingAs(User::factory()->create())
            ->test(CreateBloodPressure::class)
            ->set('blood_pressure', $blood_pressure_record)
            ->set('patient_id', $patient->id)
            ->call('create')
            ->assertRedirect(route('pressures.list',$patient));

            $bloodPressure = BloodPressure::first();
            $this->assertNotNull($bloodPressure);
    
            $this->assertEquals($bloodPressure->patient_id, $patient->id);
            $this->assertEquals($bloodPressure->patient_id, 56);

        $this->assertDatabaseCount('blood_pressures',1);
        
    }


    public function test_user_can_update_patient_blood_pressure_info()
    {

        $patient = Patient::factory()->create();
        $bloodPressureOldInfo = BloodPressure::factory()->create(['patient_id'=>$patient->id]);
        $blood_pressure = '110/500';

        $this->assertNotEquals($bloodPressureOldInfo->blood_pressure, $blood_pressure);

        Livewire::actingAs(User::factory()->create())
            ->test(UpdateBloodPressure::class,['patient' => $patient,'bloodPressure'=>$bloodPressureOldInfo])
            ->set('blood_pressure', $blood_pressure)
            ->call('update',$patient->id,$bloodPressureOldInfo->id)
            ->assertRedirect(route('pressures.list',$patient));

            $bloodPressure = BloodPressure::first();
    
            $this->assertEquals($bloodPressure->blood_pressure, $blood_pressure);
            $this->assertEquals($patient->id, $bloodPressure->patient_id);
    }


    public function test_user_can_view_patient_blood_pressure_list()
    {

        $patient = Patient::factory()->create();

        Livewire::actingAs(User::factory()->create())
            ->test(PatientBloodPressureList::class,['patient' => $patient])
            ->assertOk();
    }


    public function test_user_can_delete_patient_blood_pressure_info()
    {

        $patient = Patient::factory()->create();
        $bloodPressure = BloodPressure::factory()->create(['patient_id'=>$patient->id]);
        $this->assertDatabaseCount('blood_pressures',1);

        Livewire::actingAs(User::factory()->create())
            ->test(DeleteBloodPressure::class,['blood_pressure'=>$bloodPressure])
            ->call('destroy',$patient->id,$bloodPressure->id);

            $bloodPressure = BloodPressure::first();
    
            $this->assertNull($bloodPressure);
    }
}
