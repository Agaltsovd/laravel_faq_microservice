<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqsTags extends Model
{

    protected $table = 'faqs_tags';
    public $fillable=['faq_id','tag_id','answer'];
    public function tag()
    {
        $tags= Tags::all()->where('id', '=', $this->tag_id);
        return $tags;
    }

}
