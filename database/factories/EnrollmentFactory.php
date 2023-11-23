<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $student = Student::factory()->create();
        $course = Course::factory()->create();

        return [
            'student_id' => $student->id,
            'course_id' => $course->id,
            'enrollment_date' => fake()->dateTimeThisMonth(),
            'status' => fake()->randomElement(['enrolled', 'canceled'])
        ];
    }
}
