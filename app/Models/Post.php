<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
  

    protected $fillable = [
        'title',
        'slug',
        'body',
        'enabled',
        'published_at',
        'user_id',
        'img'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}