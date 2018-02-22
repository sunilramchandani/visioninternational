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

        public function eventcategory()
        {
            return $this->belongsTo('App\EventCategory', 'category_name');
        }

        public function blogcategorytable()
        {
            return $this->hasMany('App\BlogCategory', 'category_id');
        }


         public function blog()
        {
        return $this->belongsTo('App\Blog', 'id');
        }

         public function newscategory()
        {
            return $this->belongsTo('App\NewsCategory', 'category_name');
        }

        public function newscategorytable()
        {
            return $this->hasMany('App\NewsCategory', 'category_id');
        }

        public function eventcategorytable()
        {
            return $this->hasMany('App\EventCategory', 'category_id');
        }



        public function news()
        {
        return $this->belongsTo('App\News', 'id');
        }

}
