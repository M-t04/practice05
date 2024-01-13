<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    
    //Gameに対するリレーション
    //１:多の関係なので単数形に
        public function game()
    {
        return $this->belongsTo(game::class);
    }
    
    protected $fillable = [
        'body',
        'game_id'
        ];
}
