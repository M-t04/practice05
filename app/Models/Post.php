<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Post extends Model
{
    use HasFactory;
    
    // Gameに対するリレーション
    //「1対多」の関係なので単数系に
    public function game()
    {
        return $this->belongsTo(game::class);
    }
    
    protected $fillable = [
        'body',
        'game_id'
        ];
}
