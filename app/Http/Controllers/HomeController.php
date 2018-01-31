<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedImage;
use App\InternshipCompany;
use App\Opportunity;
use App\Qualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\InternshipDuration;
use App\Application;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredimage_home = FeaturedImage::where('page_name','home')->get();
        $state_count = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->distinct('state')->count('state');
        $company_count = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->count('id');
        $applicant_count = Application::count('id');

        return view('welcome', compact('featuredimage_home','state_count','company_count','applicant_count'));
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
