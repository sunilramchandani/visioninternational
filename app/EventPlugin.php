<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPlugin extends Model
{
    use SoftDeletes;

    protected $table = 'fbevents'; 
    protected $primaryKey = 'fbevent_id';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];



    public $timestamps = false;

    protected $fillable = [
        
        'event_name', 'event_description','cover_source', 'start_time','end_time', 'place_name','place_id', 'location_city','location_country', 'location_latitude'
        , 'location_longtitude','location_street', 'location_zip','timezone', 'post_id'
    
    ];

    public function eventcategory()
    {
        return $this->hasMany('App\EventCategory', 'event_id');
    }

    public function categorylist()
    {
        return $this->hasMany('App\CategoryList', 'id');
    }

    public function scopeSearch($query, $s){
        return $query->where('event_name', 'like', '%' .$s. '%');
        
    }
}
