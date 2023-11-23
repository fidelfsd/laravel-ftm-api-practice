<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { // create user
        $user = User::factory()->create();

        // assign student role
        $date = date('Y-m-d H:i:s');
        $user->roles()->attach(3, ['created_at' => $date, 'updated_at' => $date]);

        return [
            'user_id' => $user->id,
            'specialization' => fake()->randomElement([
                'Web Development',
                'JavaScript',
                'Node.js',
                'React.js',
                'Database Management',
                'DevOps and Deployment',
            ]),
            'academic_degree' => fake()->randomElement([
                'Bachelor of Science in Computer Science',
                'Master of Information Technology',
                'Ph.D. in Software Engineering',
                'Bachelor of Arts in Web Design',
                'Master of Computer Applications',
                'Doctorate in Computer Science',
            ]),
            'work_experience' => fake()->numberBetween(3, 15)
        ];
    }
}
