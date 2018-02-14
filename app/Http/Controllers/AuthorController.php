<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use SoftDeletes;

    protected $fillable = [
        'author_image',
        'author_description',   
    ];
}
