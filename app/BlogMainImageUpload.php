<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogMainImageUpload extends Model
{
    protected $table = 'blog_main_image'; 
    protected $primaryKey = 'id'; 

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blog_id');
    }
}
