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
}
