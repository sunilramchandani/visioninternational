<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkCompany;
use App\FeaturedImage;



class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if (request()->has('cid')){
            $featuredimage_internship = FeaturedImage::where('page_name','work')->get();
            $internshipCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->where('id', request('cid'))->paginate(0)->appends('id', request('cid'));
        	
            $internship_addresses = WorkCompany::where('id', request('cid'))->pluck('housing_address');
            $internship_name = WorkCompany::where('id', request('cid'))->pluck('company_name');
            $internship_desc = WorkCompany::where('id', request('cid'))->pluck('description');
            $internship_filter = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
 			$internship_id = WorkCompany::where('state', request('state'))->pluck('id');
            return view('users.work.company.work_company', compact('featuredimage_internship', 'internshipCompany_table', 'internship_filter','internship_addresses','internship_name','internship_desc','internship_id'));
        }
        else{
            $featuredimage_internship = FeaturedImage::where('page_name','work')->get();
            $internshipCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
        
            $internship_addresses = WorkCompany::pluck('housing_address');
            $internship_name = WorkCompany::pluck('company_name');
            $internship_desc = WorkCompany::pluck('description');
            return view('users.work.work', compact('featuredimage_internship', 'internshipCompany_table','internship_addresses','internship_name','internship_desc'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
