<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => 'youness',
                'lastname' => 'kamal',
                'email' => 'youness.doe@example.com',
                'password' => bcrypt('password123'), 
                'phone' => '1234567890',
                'image' => 'kamal.jpg',
            ],
            [
                'firstname' => 'Aamir',
                'lastname' => 'elamiri',
                'email' => 'Aamir.Aamir@example.com',
                'password' => bcrypt('password123'),
                'phone' => '0987654321',
                'image' => 'Aamir.jpg',
            ],
            [
                'firstname' => 'ghandor',
                'lastname' => 'abdelhak',
                'email' => 'abdelhak@example.com',
                'password' => bcrypt('password123'),
                'phone' => '1122334455',
                'image' => 'abdelhak.jpg',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
