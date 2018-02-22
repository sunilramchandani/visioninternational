<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonials extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'organization',
        'testimony',
        'image_testimony',
        'created_by'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
