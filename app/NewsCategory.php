<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'category_news'; 
    protected $primaryKey = 'id';

    protected $fillable = [
        'news_id',
        'category_id'
    ];

    public function news()
    {
        return $this->belongsTo('App\News', 'news_id');
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
