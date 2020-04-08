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
            'phone_number' => '+6281234566789',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        User::create([
            'nip' => '11706070',
            'name' => 'Administrator',
            'address' => '-',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'phone_number' => '+6281234566789',
            'gender' => 'L',
            'photo' => 'superadmin.png',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        User::create([
            'nip' => '1',
            'name' => 'Students',
            'address' => '-',
            'email' => 'student@student.com',
            'role' => 'student',
            'phone_number' => '+6281234566789',
            'kelas' => 'XII',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
