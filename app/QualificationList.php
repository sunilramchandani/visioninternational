<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationList extends Model
{
    protected $table = 'qualification_list'; 
    protected $primaryKey = 'id';

    protected $fillable= ['qualification_name'];

        public function qualification()
        {
            return $this->belongsTo('App\Qualification', 'qualification_name');
        }

}

