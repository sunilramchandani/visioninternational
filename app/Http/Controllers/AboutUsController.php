<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $about_table = AboutUs::all();
        return view('users.about_us.aboutus', compact('about_table'));
    }
}
