<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedImage;

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
        $featuredimage = FeaturedImage::find($id);
        return view('admin.featured_image.form', compact('featuredimage'));
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
       
        if ($request->hasFile('main_image')){
        $file = $request->file('main_image');
        $name = $file->getClientOriginalName();
        $fileName = $name;
        $file->move('image/uploaded_featured_image', $fileName);
        $featuredimage->main_image = $fileName;
        $featuredimage->main_image_description = $request['main_image_description'];
        }

        if ($request->hasFile('sub_image1')){
            $file = $request->file('sub_image1');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image1 = $fileName;
            $featuredimage->sub_image1_description = $request['sub_image1_description'];
        }

        if ($request->hasFile('sub_image2')){
            $file = $request->file('sub_image2');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image2 = $fileName;
            $featuredimage->sub_image2_description = $request['sub_image2_description'];
        }

        if ($request->hasFile('sub_image3')){
            $file = $request->file('sub_image3');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image3 = $fileName;
            $featuredimage->sub_image3_description = $request['sub_image3_description'];
        }

        if ($request->hasFile('sub_image4')){
            $file = $request->file('sub_image4');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image4 = $fileName;
            $featuredimage->sub_image4_description = $request['sub_image4_description'];
        }

        if ($request->hasFile('sub_image5')){
            $file = $request->file('sub_image5');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image5 = $fileName;
            $featuredimage->sub_image5_description = $request['sub_image5_description'];
       }
       
        $featuredimage->save();
        $success = array('ok'=> 'The Request has been approved!');
        return redirect()->route('featuredimage.index')->with($success);
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
