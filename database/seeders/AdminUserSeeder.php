<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'first_name' => "Admin",
            "last_name" => "Officer",
            "email" => 'admin@gmail.com',
            'password' => 'P@ssw0rd@123',
            'username' => 'adminUser'

        ]);

        $user->assignRole('creator administrator');

    }
}
