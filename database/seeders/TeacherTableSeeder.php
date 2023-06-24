<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\TeacherModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classIds = ClassModel::pluck('id')->toArray();

        $teachers = [
            [
                'teacher_name' => 'John Smith',
                'id_class' => $classIds[array_rand($classIds)],
                'username' => 'john.smith',
                'password' => bcrypt('password123'),
            ],
            [
                'teacher_name' => 'Jane Johnson',
                'id_class' => $classIds[array_rand($classIds)],
                'username' => 'jane.johnson',
                'password' => bcrypt('password456'),
            ],
            [
                'teacher_name' => 'Robert Doe',
                'id_class' => $classIds[array_rand($classIds)],
                'username' => 'robert.doe',
                'password' => bcrypt('password789'),
            ],
        ];

        foreach ($teachers as $teacher) {
            TeacherModel::create($teacher);
        }
    }
}
