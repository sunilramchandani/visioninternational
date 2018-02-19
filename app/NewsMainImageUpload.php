<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsMainImageUpload extends Model
{
    protected $table = 'news_main_image'; 
    protected $primaryKey = 'id'; 

    public function news()
    {
        return $this->belongsTo('App\News', 'news_id');
    }
}
