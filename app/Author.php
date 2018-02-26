<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author'; 
    protected $primaryKey = 'author_id'; 

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'author_id', 'author_id');
    }

    public function news()
    {
        return $this->belongsTo('App\News', 'author_id', 'author_id');
    }

    public function media()
    {
        return $this->belongsTo('App\Media', 'author_id', 'media_author');
    }
}
