<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedImage extends Model
{
    protected $table = 'featuredimage'; 

    protected $fillable = [
        'page_name',
        'image',
    ];
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

}
