<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use Mail;
use App\FeaturedImage;
use App\Country;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonials;
use App\Models\Programs;



class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredimage_contactus = FeaturedImage::where('page_name','contact_us')->get();

        //use $testimonial on foreach
        $get_testimonial = DB::table('featuredimage')
            ->where('page_name', 'contact_us')
            ->first()
            ->testimonial_id;

        $testimonial = Testimonials::where('id', $get_testimonial)->get();



        $contactus_table = ContactUs::all();
        $country = Country::pluck('country_name');
        return view('users.contact_us.contact_us', compact('testimonial', 'featuredimage_contactus', 'contactus_table','country'));
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

        $data = array(
            'name' => $request->name,
            'email'   => $request->email,
            'contact_no'   => $request->contact_no,
            'country'   => $request->country,
            'general_inquiries'   => $request->general_inquiries,
            'bodyMessage'   => $request->message,
        );

        /*  
        $title = $request->input('title');
        $article = $request->input('article');


        $this->dispatch(new SendNotificationJob($title, $article ));

        Mail::send('users.contact_us.contact_received', $data, function ($mail) use($data) {
            $mail->from($data['email']);
            $mail->to('careers@visioninternational.skyrocketph.technology')->subject($data['general_inquiries']);
        });

        Mail::send('users.contact_us.contact_sent', $data, function ($mail) use($data) {
            $mail->from('careers@visioninternational.skyrocketph.technology');
            $mail->to($data['email'])->subject($data['name']);
        });
        */


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
