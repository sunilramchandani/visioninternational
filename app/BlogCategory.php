<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'category_blog'; 
    protected $primaryKey = 'id';

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blog_id');
    }
    
    public function categorylist()
    {
        return $this->belongsTo('App\CategoryList', 'category_id');
    }

}
