<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus_table = ContactUs::all();
        return view('users.contact_us', compact('contactus_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactus_table = ContactUs::all();
        return view('users.contact_us', compact('contactus_table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email'   => 'required|string|email',
            'contact_no'   => 'required|numeric',
            'country'   => 'required|string',
            'general_inquiries'   => 'required',
            'message'   => 'required',
            ]);
        
        $contactus = new ContactUs;
        $contactus->name = $request['name'];
        $contactus->email = $request['email'];
        $contactus->contact_no = $request['contact_no'];
        $contactus->country = $request['country'];
        $contactus->general_inquiries = $request['general_inquiries'];
        $contactus->message = $request['message'];
        $contactus->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('contactus.index')->with($success);
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
