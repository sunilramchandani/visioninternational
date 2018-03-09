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
    	$featuredimage_internship = FeaturedImage::where('page_name','opportunity')->get();
        $internshipCompany_table = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->orderBy('id','asc')->get();
        $workCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->orderBy('id','asc')->get();

        return view('users.opportunity.opportunity', compact('internshipCompany_table','featuredimage_internship','workCompany_table'));
    }

}
