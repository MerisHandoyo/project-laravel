<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
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
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'name' => $subject,
            ]);
        }
    }
}
