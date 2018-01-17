<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Location;
use App\Country;
use App\Program;
use App\University;
use App\Degree;
use App\Major;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application_table = Application::all();
        $location_table = Location::all();
        $country_table = Country::all();
        $program_table = Program::all();
        $university_table = University::all();
        $degree_table = Degree::all();
        $major_table = Major::all();
        return view('users.application_form.application_form', compact('major_table', 'degree_table', 'university_table', 'program_table', 'application_table', 'location_table', 'country_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $application_table = Application::all();
        $location = Location::pluck('location_name', 'location_id');
        $country = Country::pluck('country_name', 'country_id' );
        $program = Program::pluck('title', 'program_id' );

        $university = University::pluck('university_name', 'university_id');
        $degree = Degree::pluck('degree_name', 'degree_id' );
        $major = Major::pluck('major_name', 'major_id' );

        return view('users.application_form.application_form', compact('major', 'degree', 'university', 'program', 'application_table', 'location', 'country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'   => 'required|string|email',
            'contact_no'   => 'required|numeric',
            'country'   => 'required|string',
            'general_inquiries'   => 'required',
            'message'   => 'required',
            ]);
        */

        $application = new Application;
        $application->program_id = $request['program_id'];
        $application->country_id = $request['country_id'];
        $application->location_id = $request['location_id'];
        $application->last_name = $request['last_name'];
        $application->first_name = $request['first_name'];
        $application->email = $request['email'];
        $application->contact_no = $request['contact_no'];
        $application->birthdate = $request['birthdate'];
        $application->gender = $request['gender'];
        $application->current_city = $request['current_city'];
        $application->university_id = $request['university_id'];
        $application->degree_id = $request['degree_id'];
        $application->major_id = $request['major_id'];
        $application->grad_date = $request['grad_date'];
        $application->start_date = $request['start_date'];
        $application->upload_resume = $request['upload_resume'];
        $application->about_vip = $request['about_vip'];
        $application->message = $request['message'];


        $application->save();
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
