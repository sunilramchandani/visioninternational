<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipCompany;
use App\Opportunity;
use App\Qualification;
use App\InternshipDuration;
use App\InternshipIndustry;
use App\FeaturedImage;
use App\WorkCompany;
use App\WorkOpportunity;
use App\WorkQualification;
use App\WorkDuration;
use App\WorkIndustry;

class opportunityController extends Controller
{
    public function index()
    {
    	$featuredimage_internship = FeaturedImage::where('page_name','Internship')->get();
    	$featuredimage_work = FeaturedImage::where('page_name','Work')->get();
 		$featuredimage_aupair = FeaturedImage::where('page_name','aupair')->get();
 		$featuredimage_skilled = FeaturedImage::where('page_name','workvisa')->get();
 

        return view('users.opportunity.opportunity', compact('featuredimage_internship','featuredimage_work','featuredimage_aupair'));
    }

}
