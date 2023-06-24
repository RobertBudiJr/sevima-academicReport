<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\StudentModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classIds = ClassModel::pluck('id')->toArray();

        $students = [
            [
                'student_name' => 'John Doe',
                'id_class' => $classIds[array_rand($classIds)],
                'username' => 'john.doe',
                'password' => bcrypt('password123'),
            ],
            [
                'student_name' => 'Jane Smith',
                'id_class' => $classIds[array_rand($classIds)],
                'username' => 'jane.smith',
                'password' => bcrypt('password456'),
            ],
            [
                'student_name' => 'Robert Johnson',
                'id_class' => $classIds[array_rand($classIds)],
                'username' => 'robert.johnson',
                'password' => bcrypt('password789'),
            ],
        ];

        foreach ($students as $student) {
            StudentModel::create($student);
        }
    }
}
