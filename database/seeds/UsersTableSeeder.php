<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nip' => '11706070',
            'name' => 'Teachers',
            'address' => '-',
            'email' => 'test@gmail.com',
            'role' => 'teacher',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        User::create([
            'nip' => '11706070',
            'name' => 'Administrator',
            'address' => '-',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        User::create([
<<<<<<< HEAD
            'nip' => '-',
=======
>>>>>>> 0f60223c5a666e609771a9b09d7b4eb6feea3662
            'name' => 'Students',
            'address' => '-',
            'email' => 'student@student.com',
            'role' => 'student',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
