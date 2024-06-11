<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}

