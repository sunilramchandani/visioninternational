<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faq;

class faqController extends Controller
{
     public function index(){
     	$internship = faq::where('faq_type','internship')->get();

        return view('users.FAQ.faq', compact('internship'));
    }
}
