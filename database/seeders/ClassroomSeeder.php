<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            Classroom::firstOrCreate(['name' => 'X PPLG 1', 'major' => 'PPLG']),
            Classroom::firstOrCreate(['name' => 'XI PPLG 2', 'major' => 'PPLG']),
            Classroom::firstOrCreate(['name' => 'XII DKV 1', 'major' => 'DKV']),
            Classroom::firstOrCreate(['name' => 'XII ANIMASI 1', 'major' => 'ANIMASI']),
        ];

        foreach (Student::orderBy('id')->get() as $index => $student) {
            $student->update([
                'classroom_id' => $classrooms[$index % count($classrooms)]->id,
                'address' => fake('id_ID')->address(),
            ]);
        }

        Classroom::doesntHave('students')->delete();
    }
}
