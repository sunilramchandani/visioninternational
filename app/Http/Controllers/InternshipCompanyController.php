<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipCompany;
use App\Opportunity;
use App\Qualification;
class InternshipCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (request()->has('state')){
            $internshipCompany_table = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->where('state', request('state'))->paginate(0)->appends('state', request('state'));
        
            $internship_addresses = InternshipCompany::where('state', request('state'))->pluck('housing_address');

            $internship_filter = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->get();

            return view('users.internship.internship', compact('internshipCompany_table', 'internship_filter','internship_addresses'));
        }
        else{
            $internshipCompany_table = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->get();
        
            $internship_addresses = InternshipCompany::pluck('housing_address');

            return view('users.internship.internship', compact('internshipCompany_table','internship_addresses'));
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
