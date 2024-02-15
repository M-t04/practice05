<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Commment;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'body',
        'game_id',
        'user_id',
    ];
    
    // Gameに対するリレーション
    //「1対多」の関係なので単数系に
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function isfavoritedByUser($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }
    
    // postテーブルに存在する一つのデータに対して行う処理
}