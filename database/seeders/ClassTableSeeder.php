<?php

namespace Database\Seeders;

use App\Models\ClassModel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassModel::create(['class_name' => 'XII']);
        ClassModel::create(['class_name' => 'XI']);
        ClassModel::create(['class_name' => 'X']);
    }
}
