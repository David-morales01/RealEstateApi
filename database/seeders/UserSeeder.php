<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'David Morales',
                'email' => 'davidmorales@gmail.com',
                'email_verified_at' => now(),
                'created_at' => now(),
                'img_user' => null,
                'remember_token' => Str::random(10),
                'password' => bcrypt('1234567891'),
                'rol' => ('admin'),
            ],
        );

        DB::table('users')->insert(
            [
                'name' => 'Root Admin',
                'email' => 'root@gmail.com',
                'email_verified_at' => now(),
                'created_at' => now(),
                'img_user' => null,
                'remember_token' => Str::random(10),
                'password' => bcrypt('1234567891'),
                'rol' => ('superAdmin'),
            ],
        );

        DB::table('users')->insert(
            [
                'name' => 'Daniel Cajina',
                'email' => 'danielcajina@gmail.com',
                'email_verified_at' => now(),
                'created_at' => now(),
                'img_user' => null,
                'remember_token' => Str::random(10),
                'password' => bcrypt('1234567891'),
                'rol' => ('user'),
            ]
        );
    }
}
