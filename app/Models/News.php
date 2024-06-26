<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover_image', 'content', 'published_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
