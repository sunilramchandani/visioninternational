<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faq;

class faqController extends Controller
{
     public function index(){
     	$internship = faq::where('faq_type','internship')->get();
     	$spring = faq::where('faq_type','spring')->get();
     	$summer = faq::where('faq_type','summer')->get();
     	$aupair = faq::where('faq_type','aupair')->get();
     	$faq_types = faq::distinct('state')->pluck('faq_type');

        return view('users.FAQ.faq', compact('internship','summer','spring','aupair','faq_types'));
    }
}
