<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') ->insert([
            [
                'email'  =>'admin@gmail.com',
                'name' => 'admin',
                'password' =>  Hash::make('admin'),
                'email_verified_at' => '2024-01-24 08:54:15',
                'role' => 0
            ],
            [
                'email'  =>'hau.nguyebk19@gmail.com',
                'name' => 'Hau customer',
                'password' =>  Hash::make('hau.nguyebk19'),
                'email_verified_at' => '2024-01-24 08:54:15',
                'role' => 1
            ]
        ]);
    }
}
