<?php

namespace Database\Seeders;

use App\Models\Dormitory;
use App\Models\Student;
use App\Models\StudentScholarship;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => "Alex",
            'email' => "alex@dekanat.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        Dormitory::factory(6)->create()->each(function ($dormitory) use (&$allStudents) {
            $dormitory->students()->saveMany(Student::factory(10)->make());
        });

        $allStudents = Student::all()->each(function ($student) {
            $student->scholarships()->saveMany(StudentScholarship::factory(10)->make());
        });
    }
}
