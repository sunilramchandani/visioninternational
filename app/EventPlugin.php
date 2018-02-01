<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPlugin extends Model
{
    protected $table = 'fbevents'; 
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        
        'event_name', 'event_description','cover_source', 'start_time','end_time', 'place_name','place_id', 'location_city','location_country', 'location_latitude'
        , 'location_longtitude','location_street', 'location_zip','timezone', 'post_id'
    
    ];
}
