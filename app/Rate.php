<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates'; 
    protected $primaryKey = 'id';

    public $timestamps = false;

}
