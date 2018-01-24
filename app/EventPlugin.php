<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPlugin extends Model
{
    protected $table = 'fbpage'; 
    protected $primaryKey = 'event_id';

    protected $fillable = ['name', 'description'];
}
