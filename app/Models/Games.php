<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    // Define fillable fields if you want to use mass assignment
    protected $fillable = ['Title', 'Genre', 'Platform', 'Developer', 'Image'];
}
