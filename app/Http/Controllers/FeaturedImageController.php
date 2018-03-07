<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedImage;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonials;
use App\Models\Programs;
Use Carbon\Carbon;


class FeaturedImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredimage_table = FeaturedImage::all();
        return view('admin.featured_image.view', compact('featuredimage_table'));
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
    public function show($featured)
    {
        $featured = DB::table('featuredimage')->select('page_name')->get();
        return view('layouts.admin', compact('featured'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $featuredimage = FeaturedImage::find($id);
        $testimonial_table = Testimonials::all();
        $promo_table = Programs::all();
        return view('admin.featured_image.form', compact('featuredimage', 'testimonial_table', 'promo_table'));
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
        $featuredimage = FeaturedImage::find($id);
       
        //Main Image
        if ($request->hasFile('main_image')){
            $file = $request->file('main_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->main_image = $fileName;
        }

        if ($request->has('main_image_description')){
            $featuredimage->main_image_description = $request['main_image_description'];
        }

        //Sub Image 1
        if ($request->hasFile('sub_image1')){
            $file = $request->file('sub_image1');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image1 = $fileName;
        }
    
        //Sub Image 2
        if ($request->hasFile('sub_image2')){
            $file = $request->file('sub_image2');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image2 = $fileName;
            
        }

        //Sub Image 3
        if ($request->hasFile('sub_image3')){
            $file = $request->file('sub_image3');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image3 = $fileName;
        }

        if ($request->has('sub_image3_validity')){
            $featuredimage->sub_image3_validity = $request['sub_image3_validity'];
        }

        if ($request->has('sub_image3_title')){
            $featuredimage->sub_image3_title = $request['sub_image3_title'];
        }

        if ($request->has('sub_image3_description')){
            $featuredimage->sub_image3_description = $request['sub_image3_description'];
        }

        //Sub Image 4
        if ($request->hasFile('sub_image4')){
            $file = $request->file('sub_image4');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image4 = $fileName;
        }

        if ($request->has('sub_image4_description')){
            $featuredimage->sub_image4_description = $request['sub_image4_description'];
        }   

        //Home Only
        if ($request->has('sub_image4_sender')){
            $featuredimage->sub_image4_sender = $request['sub_image4_sender'];
        }

        if ($request->has('sub_image4_sender_title')){
            $featuredimage->sub_image4_sender_title = $request['sub_image4_sender_title'];
        }

        if ($request->has('promo_id')){
            $featuredimage->promo_id = $request['promo_id'];
        }

        if ($request->has('testimony_id')){
            $featuredimage->testimony_id = $request['testimony_id'];
        }

        $featuredimage->save();
        $success = array('ok'=> 'Success!');
        return redirect()->back()->with($success);
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
