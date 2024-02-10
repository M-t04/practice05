<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
        'title' => '世界のアソビ大全51',
        'image' => '',
        'category_id' => 1,
        'description' => '世界のアソビが大集合',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
        'title' => 'スイカゲーム',
        'image' => '',
        'category_id' => 1,
        'description' => 'スイカを目指そう！',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
        'title' => 'スプラトゥーン3',
        'image' => '',
        'category_id' => 2,
        'description' => 'さらに広がるナワバリバトル！',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
        'title' => 'フォートナイト',
        'image' => '',
        'category_id' => 2,
        'description' => 'FORTNITEで見つけよう',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
        'title' => '大乱闘スマッシュブラザーズ SPECIAL',
        'image' => '',
        'category_id' => 3,
        'description' => '豪華ファイター、奇跡の大集結！',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
        'title' => 'カービィファイターズ2',
        'image' => '',
        'category_id' => 3,
        'description' => 'コピー能力ファイト！',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
        'title' => 'マリオカート８ デラックス',
        'image' => '',
        'category_id' => 4,
        'description' => 'いつでもどこでもマリオカート！',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
        
        DB::table('games')->insert([
        'title' => 'スーパーマリオRPG',
        'image' => '',
        'category_id' => 5,
        'description' => '仲間といっしょに冒険の旅へ',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ]);
    }
}
