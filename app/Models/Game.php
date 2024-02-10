<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Category;

class Game extends Model
{
    use HasFactory;
    
    // Postに対するリレーション
    //「1対多」の関係なので'posts'と複数形に
    public function posts()   
    {
        return $this->hasMany(Post::class);  
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getByGame(int $limit_count = 5)
    {
        return $this->posts()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}