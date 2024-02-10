<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '飛行機',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'くるま',
            'email' => 'test2@test.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'うさぎ',
            'email' => 'test3@test.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'name' => 'ねこ',
            'email' => 'test4@test.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

    }
}
