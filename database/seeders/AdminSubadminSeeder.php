<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSubadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Neeraj Choudhary',
            'email' => 'admin@mail.com',
            'password' => Hash::make(123456789)
        ];

        $subadmin = [
            'name' => 'Robot',
            'email' => 'subadmin@mail.com',
            'password' => Hash::make(123456789)
        ];

        $admin =User::firstOrCreate(['email' => $admin['email']], $admin);
        $subadmin = User::firstOrCreate(['email' => $subadmin['email']], $subadmin);

        $admin->assignRole('admin');
        $subadmin->assignRole('subadmin');

    }
}
