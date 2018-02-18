<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model
{
    protected $table = 'category_list'; 
    protected $primaryKey = 'id';

    public function blogcategory()
    {
        return $this->hasMany('App\BlogCategory', 'category_id');
    }
}
