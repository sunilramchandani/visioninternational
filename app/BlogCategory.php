<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'category_blog'; 
    protected $primaryKey = 'id';

    protected $fillable = [
        'blog_id',
        'category_id'
    ];

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blog_id');
    }
    
    public function categorylist()
    {
        return $this->belongsTo('App\CategoryList', 'category_id');
    }

    public function categorylisttable()
    {
        return $this->hasMany('App\CategoryList', 'id');
    }


}
