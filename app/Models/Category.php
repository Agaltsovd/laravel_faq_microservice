<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = null;

    public $fillable = ['name', 'is_active','sort_weight','icon_url'];

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id', 'id');
    }
}
