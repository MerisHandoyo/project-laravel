<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['nis' => '1001', 'name' => 'Ahmad Rizky', 'classroom' => 'X RPL 1'],
            ['nis' => '1002', 'name' => 'Budi Santoso', 'classroom' => 'X RPL 1'],
            ['nis' => '1003', 'name' => 'Citra Lestari', 'classroom' => 'X RPL 2'],
            ['nis' => '1004', 'name' => 'Dewi Anggraini', 'classroom' => 'XI RPL 1'],
            ['nis' => '1005', 'name' => 'Eko Prasetyo', 'classroom' => 'XI RPL 1'],
            ['nis' => '1006', 'name' => 'Fajar Nugraha', 'classroom' => 'XI RPL 2'],
            ['nis' => '1007', 'name' => 'Gita Gutawa', 'classroom' => 'XII RPL 1'],
            ['nis' => '1008', 'name' => 'Hendra Setiawan', 'classroom' => 'XII RPL 1'],
            ['nis' => '1009', 'name' => 'Indah Permata', 'classroom' => 'XII RPL 2'],
            ['nis' => '1010', 'name' => 'Joko Widodo', 'classroom' => 'XII RPL 2'],
        ];

        DB::table('students')->insert($students);
    }
}

