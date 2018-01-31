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
        $featuredimage->description = $request['description'];
        if ($request->hasFile('featured_image')){
        $file = $request->file('featured_image');
        $name = $file->getClientOriginalName();
        $fileName = $name;
        $file->move('image/uploaded_featured_image', $fileName);
        $featuredimage->image = $fileName;
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
