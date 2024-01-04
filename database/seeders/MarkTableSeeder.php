<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Student;
use App\Models\Mark;
use Database\Factories\MarkFactory; // Make sure to import MarkFactory




class MarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the marks table with foreign key relationships
        $students = Student::all();

        foreach ($students as $student) {
            Mark::factory(MarkFactory::class)->create([
                'student_id' => $student->id,
            ]);
        }
    }
}
