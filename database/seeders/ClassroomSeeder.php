<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            ['name' => 'X PPLG 1', 'major' => 'PPLG'],
            ['name' => 'X PPLG 2', 'major' => 'PPLG'],
            ['name' => 'XI PPLG 1', 'major' => 'PPLG'],
            ['name' => 'XI PPLG 2', 'major' => 'PPLG'],
            ['name' => 'XII PPLG 1', 'major' => 'PPLG'],
            ['name' => 'XII PPLG 2', 'major' => 'PPLG'],
            ['name' => 'X DKV 1', 'major' => 'DKV'],
            ['name' => 'X DKV 2', 'major' => 'DKV'],
            ['name' => 'XI DKV 1', 'major' => 'DKV'],
            ['name' => 'XII DKV 1', 'major' => 'DKV'],
        ];

        DB::table('classrooms')->insert($classrooms);
    }
}
