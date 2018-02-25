<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{

    use SoftDeletes;
    protected $table = 'about_us'; 
    protected $primaryKey = 'id';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
