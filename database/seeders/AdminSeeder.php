<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'name' => '【管理者】まつはし',
                'email' => 'a@a.com',
                'password' =>  Hash::make('ripslyme3080'),
                'created_at' => '2023/11/21 12:00:00'
            ],
            [
                'name' => 'てすと',
                'email' => 'test@test.com',
                'password' => Hash::make('testtest1'),
                'created_at' => '2023/10/24 12:00:00'
            ]
        ]);
    }
}
