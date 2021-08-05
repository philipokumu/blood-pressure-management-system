<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Patient $patient) {
            $patient->patient_number = '#' . str_pad($patient->id, 6, "0", STR_PAD_LEFT);
            $patient->save();
        });
    }
}
