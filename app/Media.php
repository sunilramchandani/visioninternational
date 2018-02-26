<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{

    use SoftDeletes;
    protected $table = 'media'; 
    protected $primaryKey = 'media_id';

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public function author()
    {
        return $this->hasMany('App\Author', 'author_id', 'media_author');
    }


}
