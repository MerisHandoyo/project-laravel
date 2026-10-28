<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'X PPLG 1',
                'X PPLG 2',
                'XI PPLG 1',
                'XI PPLG 2',
                'XII PPLG 1',
                'XII PPLG 2',
                'X DKV 1',
                'X DKV 2',
                'XI DKV 1',
                'XII DKV 1',
            ]),
            'major' => fake()->randomElement([
                'PPLG',
                'DKV',
                'TJKT',
            ]),
        ];
    }
}
