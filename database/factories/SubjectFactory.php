<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Matematika',
                'Bahasa Indonesia',
                'Bahasa Inggris',
                'Pemrograman Web',
                'Basis Data',
                'Pemrograman Berorientasi Objek',
                'Produk Kreatif dan Kewirausahaan',
                'Pendidikan Pancasila',
                'Sejarah',
                'Pendidikan Jasmani',
            ]),
        ];
    }
}
