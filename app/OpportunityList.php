<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpportunityList extends Model
{
    protected $table = 'opportunity_list'; 
    protected $primaryKey = 'id';

    protected $fillable= ['opportunity_name'];

        public function opportunity()
        {
            return $this->belongsTo('App\Opportunity', 'opportunity_name');
        }

        public function workopportunity()
        {
            return $this->belongsTo('App\WorkOpportunity', 'opportunity_name');
        }
}
