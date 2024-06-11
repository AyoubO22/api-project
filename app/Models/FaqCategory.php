<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    public function questions()
    {
        return $this->hasMany(FaqQuestion::class);
    }
}
