<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // create user
        $user = User::factory()->create();

        // assign student role
        $date = date('Y-m-d H:i:s');
        $user->roles()->attach(2, ['created_at' => $date, 'updated_at' => $date]);

        return [
            'user_id' => $user->id,
            'date_of_birth' => fake()->dateTime(),
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'gender' => fake()->randomElement(['male', 'female']),
            'nationality' => fake()->countryCode()
        ];
    }
}
