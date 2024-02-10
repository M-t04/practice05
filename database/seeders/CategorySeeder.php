<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        'name' => 'パズル',
        'image' => '',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        //1
        DB::table('categories')->insert([
        'name' => 'シューティング',
        'image' => '',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        //2
        DB::table('categories')->insert([
        'name' => '格闘',
        'image' => '',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        //3
        DB::table('categories')->insert([
        'name' => 'レース',
        'image' => '',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        //4
        DB::table('categories')->insert([
        'name' => 'RPG',
        'image' => '',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        //5
        
    }
}
