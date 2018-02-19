<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model
{
    protected $table = 'category_list'; 
    protected $primaryKey = 'id';

    protected $fillable= ['category_name'];

    public function blogcategory()
    {
        return $this->belongsTo('App\BlogCategory', 'category_name');
    }

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'id');
    }

}
