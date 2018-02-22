<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table = 'category_event'; 
    protected $primaryKey = 'id';

    protected $fillable = [
        'event_id',
        'category_id'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
    
    public function categorylist()
    {
        return $this->belongsTo('App\CategoryList', 'category_id');
    }

    public function categorylisttable()
    {
        return $this->hasMany('App\CategoryList', 'id');
    }


}
