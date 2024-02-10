<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follow_user extends Model
{
    use HasFactory;
    
    protected $table = 'follow_users';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
