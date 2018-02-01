<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipCompany;
use App\Opportunity;
use App\Qualification;
use App\FeaturedImage;
class InternshipController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if (request()->has('cid')){
            $featuredimage_internship = FeaturedImage::where('page_name','internship')->get();
            $internshipCompany_table = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->where('id', request('cid'))->paginate(0)->appends('id', request('cid'));
        	
            $internship_addresses = InternshipCompany::where('id', request('cid'))->pluck('housing_address');
            $internship_name = InternshipCompany::where('id', request('cid'))->pluck('company_name');
            $internship_desc = InternshipCompany::where('id', request('cid'))->pluck('description');
            $internship_filter = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->get();
 			$internship_id = InternshipCompany::where('state', request('state'))->pluck('id');
            return view('users.internship.company.internship_company', compact('featuredimage_internship', 'internshipCompany_table', 'internship_filter','internship_addresses','internship_name','internship_desc','internship_id'));
        }
        else{
            $featuredimage_internship = FeaturedImage::where('page_name','internship')->get();
            $internshipCompany_table = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->get();
        
            $internship_addresses = InternshipCompany::pluck('housing_address');
            $internship_name = InternshipCompany::pluck('company_name');
            $internship_desc = InternshipCompany::pluck('description');
            return view('users.internship.internship', compact('featuredimage_internship', 'internshipCompany_table','internship_addresses','internship_name','internship_desc'));
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
