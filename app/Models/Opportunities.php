<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunities extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
