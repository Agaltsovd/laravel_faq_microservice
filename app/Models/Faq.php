<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $with = ['category'];

    //public $timestamps=null;

    public $fillable=['category_id','question','answer','is_active','sort_weight'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tags::class,
             'faqs_tags',
            'id',
            'faq_id'

        );
    }
    public function faqtags(){
        return $this->hasMany(FaqsTags::class,'faq_id','id');
    }

}
