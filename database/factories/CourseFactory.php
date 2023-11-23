<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->randomElement([
                "Fullstack Development with JavaScript",
                "Advanced Web Programming",
                "Design and Development of Complex Applications",
                "Software Architecture for Fullstack",
                "Frontend Development with React and Angular",
                "Backend with Node.js and Express",
                "Relational and NoSQL Databases",
                "Web Application Security",
                "Server Deployment and Administration",
                "Final Fullstack Development Project",
                "Continuous Integration and Continuous Deployment (CI/CD)",
                "Mobile Application Development",
                "Testing and Debugging in Fullstack",
                "Performance Optimization in Web Applications",
                "Introduction to Artificial Intelligence in Fullstack Development"
            ]),
            'description' => fake()->paragraph(),
            'start_date' => fake()->dateTimeThisMonth(),
            'end_date' => fake()->dateTimeInInterval('+60 days', '+30 days')
        ];
    }
}
