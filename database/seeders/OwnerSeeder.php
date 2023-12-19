<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('owners')->insert([
            [
                'name' => 'てすと-1',
                'email' => 'test1@test.com',
                'password' =>  Hash::make('testtest1'),
                'created_at' => '2023/10/24 12:00:00'
            ],
            [
                'name' => 'てすと-2',
                'email' => 'test2@test.com',
                'password' =>  Hash::make('testtest2'),
                'created_at' => '2023/10/24 12:00:00'
            ],
            [
                'name' => 'てすと-3',
                'email' => 'test3@test.com',
                'password' =>  Hash::make('testtest3'),
                'created_at' => '2023/10/24 12:00:00'
            ],
        ]);
    }
}
