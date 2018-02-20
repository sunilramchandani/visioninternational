<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blog'; 
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
        return $this->hasMany('App\BlogMainImageUpload', 'blog_id');
    }

    public function blogcategory()
    {
        return $this->hasMany('App\BlogCategory', 'blog_id');
    }

    public function categorylist()
    {
        return $this->hasMany('App\CategoryList', 'id');
    }

    public function scopeSearch($query, $s){
        return $query->where('title', 'like', '%' .$s. '%');
    }

    


}
