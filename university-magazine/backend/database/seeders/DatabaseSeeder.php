<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Faculty;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        // Seed roles
        $roles = ['Admin', 'Marketing Coordinator', 'Marketing Manager', 'Student', 'Guest'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Seed faculties
        $faculties = ['Arts and Sciences', 'Engineering', 'Medicine', 'Law', 'Business Administration', 'Social Sciences', 'Education', 'Science', 'Humanities', 'Information Technology'];
        foreach ($faculties as $facultyName) {
            Faculty::create(['name' => $facultyName]);
        }

        // Seed users and assigned roles
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Passwordkmd123'),
            'profile' => '../img/default.jpg'
        ])->roles()->attach(Role::where('name', 'Admin')->first()->id);

        // Marketing Manager
        User::create([
            'name' => 'Marketing Manager',
            'email' => 'mm@gmail.com',
            'password' => bcrypt('Passwordkmd123'),
            'profile' => '../img/default.jpg'

        ])->roles()->attach(Role::where('name', 'Marketing Manager')->first()->id);

        // Marketing Coordinators for each faculty
        foreach ($faculties as $facultyName) {
            $email = 'mc' . str_replace(' ', '', $facultyName) . '@gmail.com';
            $user = User::create([
                'name' => 'Marketing Coordinator ' . $facultyName,
                'email' => $email,
                'password' => bcrypt('Passwordkmd123'),
                'profile' => '../img/default.jpg'

            ]);

            $role = Role::where('name', 'Marketing Coordinator')->first();
            $faculty = Faculty::where('name', $facultyName)->first();

            $user->roles()->attach($role->id, ['faculty_id' => $faculty->id]);
        }

        // Students for each faculty
        foreach ($faculties as $facultyName) {
            $facultyId = Faculty::where('name', $facultyName)->first()->id;
            for ($i = 1; $i <= 3; $i++) {
                $email = 'std' . $i . str_replace(' ', '', $facultyName) . '@gmail.com';
                $user = User::create([
                    'name' => 'Student',
                    'email' => $email,
                    'password' => bcrypt('Passwordkmd123'),
                    'profile' => '../img/default.jpg'

                ]);
                $role = Role::where('name', 'Student')->first();
                $user->roles()->attach($role->id, ['faculty_id' => $facultyId]);
            }
        }

        // Guests for each faculty
        foreach ($faculties as $facultyName) {
            $email = 'gu' . str_replace(' ', '', $facultyName) . '@gmail.com';
            $user = User::create([
                'name' => 'Guest',
                'email' => $email,
                'password' => bcrypt('Passwordkmd123'),
                'profile' => '../img/default.jpg'

            ]);
            $role = Role::where('name', 'Guest')->first();
            $user->roles()->attach($role->id, ['faculty_id' => Faculty::where('name', $facultyName)->first()->id]);
        }

        // Seed magazines
        // $magazines = ['2021 University-Magazine', '2023 University-Magazine', '2024 University-Magazine', '2025 University-Magazine'];
        $magazines = ['2021 University-Magazine', '2023 University-Magazine', '2024 University-Magazine'];
        foreach ($magazines as $magazineTitle) {
            // Extract year from the magazine title
            $year = substr($magazineTitle, 0, 4);

            // Define open_date and closure_date based on the year
            $openDate = $year . '-01-01'; // Assuming open date is January 1st of the year
            $closureDate = $year . '-10-31'; // Assuming closure date is December 31st of the year
            $finalclosureDate = $year . '-12-31'; // Assuming closure date is December 31st of the year

            \App\Models\Magazine::create([
                'title' => $magazineTitle,
                'open_date' => $openDate,
                'closure_date' => $closureDate,
                'finalclosure_date' => $finalclosureDate,
            ]);
        }
    }
}