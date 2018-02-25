<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;
use Carbon\Carbon;
use App\FeaturedImage;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonials;
use App\Models\Programs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_table = AboutUs::all();
        $featuredimage_aboutUs = FeaturedImage::where('page_name', 'About_Us')->get();

        //use $testimonial on foreach
        $get_testimonial = DB::table('featuredimage')
            ->where('page_name', 'About_Us')
            ->first()
            ->testimonial_id;

        $testimonial = Testimonials::where('id', $get_testimonial)->get();




    
        return view('users.about_us.aboutus', compact('testimonial', 'about_table', 'featuredimage_aboutUs'));
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



    public function adminIndex()
    {
       $aboutUs_table = AboutUs::paginate(10);
       
       return view('admin.aboutus.list', compact('aboutUs_table'));
    }


    public function adminCreate()
    {
       $aboutUs = AboutUs::all();
       $action = route('aboutus.adminStore');
       $method = "post";
       return view('admin.aboutus.form', compact('aboutUs', 'action', 'method'));
    }


    public function adminEdit($id)
    {
       $aboutUs = AboutUs::findorFail($id);
       $action = route('aboutus.adminUpdate', $id);
       $method = "post";
       return view('admin.aboutus.form', compact('aboutUs', 'action', 'method'));
    }



    public function adminStore(Request $request)
    {
        $aboutUs = new AboutUs;

        $aboutUs->about_department = $request['about_department'];
        $aboutUs->about_name = $request['about_name'];
        $aboutUs->about_position = $request['about_position'];
        $aboutUs->about_description = $request['about_description'];

        if ($request->hasFile('upload_aboutUs_image')){
            $file = $request->file('upload_aboutUs_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_aboutUs_image', $fileName);
            $aboutUs->about_image = $fileName;
    }


        $aboutUs->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('aboutus.adminIndex')->with($success);

    }

    public function adminUpdate(Request $request, $id)
    {
        $aboutUs = AboutUs::findorFail($id);

        $aboutUs->about_department = $request['about_department'];
        $aboutUs->about_name = $request['about_name'];
        $aboutUs->about_position = $request['about_position'];
        $aboutUs->about_description = $request['about_description'];

        if ($request->hasFile('upload_aboutUs_image')){
            $file = $request->file('upload_aboutUs_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_aboutUs_image', $fileName);
            $aboutUs->about_image = $fileName;
    }


        $aboutUs->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('aboutus.adminIndex')->with($success);

    }

    public function adminDelete($id)
    {
        $aboutUs = AboutUs::findorFail($id)->delete();
        $success = array('ok'=> 'Success');
        
        return redirect()->route('aboutus.adminIndex')->with($success);

    }
    public function viewTrash(){
        $aboutUs_table = AboutUs::onlyTrashed()->get();
        return view('admin.aboutus.trash', compact('aboutUs_table'));
    }


    public function restoreTrash($id){
        $aboutUs = AboutUs::withTrashed()
        ->where('id', $id)
        ->restore();
        $success = array('ok'=> 'Successfully Restored');
        return redirect()->back()->with($success);
    }


}
