<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'super admin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('123456789'),
                'role' => 'superadmin'
            ],
            // [
            //     'name' => 'admin',
            //     'email' => 'admin@gmail.com',
            //     'password' => bcrypt('123456789'),
            //     'role' => 'admin'
            // ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
