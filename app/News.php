<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news_v2'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'title',
        'author_id',
        'body'
    ];
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public function author()
    {
        return $this->hasMany('App\Author', 'author_id', 'author_id');
    }

    public function mainimageupload()
    {
        return $this->hasMany('App\NewsMainImageUpload', 'news_id');
    }

    public function newscategory()
    {
        return $this->hasMany('App\NewsCategory', 'news_id');
    }

    public function newscategorylist()
    {
        return $this->hasMany('App\CategoryList', 'id');
    }

    public function scopeSearch($query, $s){
        return $query->where('title', 'like', '%' .$s. '%');
    }

}
