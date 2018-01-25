<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $table = 'application'; 
    
    
    protected $fillable = [
        'program_id',
        'country_id',
        'location_id',
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'birthdate',
        'gender',
        'current_city',
        'university_id',
        'degree_id',
        'major_id',
        'grad_date',
        'start_date',
        'about_vip',
        'message'
    ];
    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];


}
