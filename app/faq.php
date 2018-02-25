<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class faq extends Model
{

    use SoftDeletes;

    
    protected $table = 'faq'; 
    protected $primaryKey = 'faq_id';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
