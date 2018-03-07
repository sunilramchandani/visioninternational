<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Qualification extends Model
{
    protected $table = 'qualifications';
    protected $primaryKey = 'id';

    protected $fillable = [
        'company_id',
        'qualification_id'
    ];


    public function internshipCompany()
    {
        return $this->belongsTo('App\InternshipCompany', 'company_id');
    }

    public function qualificationlist()
    {
        return $this->belongsTo('App\QualificationList', 'qualification_id');
    }
}
