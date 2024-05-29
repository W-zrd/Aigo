<?php

namespace Database\Factories;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consultation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random patient from the users table
        $patient = User::where('user_role', 'patient')->inRandomOrder()->first();

        // Get a random doctor from the users table
        $doctor = User::where('user_role', 'doctor')->inRandomOrder()->first();

        return [
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'consultation_date' => $this->faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
            'consultation_time' => $this->faker->time('H:i:s'),
            'location' => $this->faker->city,
            'consultation_status' => $this->faker->randomElement(['pending', 'cancelled', 'approved']),
        ];
    }
}