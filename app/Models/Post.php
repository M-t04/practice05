<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    
        public function category()
    {
        return $this->belongsTo(category::class);
    }
    
    protected $fillable = [
        'body',
        'category_id'
        ];
}