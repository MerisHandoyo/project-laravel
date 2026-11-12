<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/** * @extends Factory<Student> */ class StudentFactory extends Factory
{
    /** * Define the model's default state. * * @return array<string, mixed> */ public function definition(): array
    {
        return ['name' => fake('id_ID')->name(), 'nis' => fake()->randomNumber(5, true), 'address' => fake('id_ID')->address(), 'classroom_id' => Classroom::factory()];
    }
}
