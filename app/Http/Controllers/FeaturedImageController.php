<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedImage;
use Illuminate\Support\Facades\DB;
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
       
        //Main Image
        if ($request->hasFile('main_image')){
            $file = $request->file('main_image');
            $name = $file->getClientOriginalName();
            $fileName = $name;
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
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image1 = $fileName;
        }

        if ($request->has('sub_image1_description')){
            $featuredimage->sub_image1_description = $request['sub_image1_description'];
        }

        if ($request->has('sub_image1_description_header')){
            $featuredimage->sub_image1_description_header = $request['sub_image1_description_header'];
        }

        if ($request->has('sub_image1_description_subheader')){
            $featuredimage->sub_image1_description_subheader = $request['sub_image1_description_subheader'];
        }

        //Sub Image 2
        if ($request->hasFile('sub_image2')){
            $file = $request->file('sub_image2');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image2 = $fileName;
            
        }

        if ($request->has('sub_image2_description')){
            $featuredimage->sub_image2_description = $request['sub_image2_description'];
        }

        if ($request->has('sub_image2_description_header')){
            $featuredimage->sub_image2_description = $request['sub_image2_description_header'];
        }

        if ($request->has('sub_image2_description_subheader')){
            $featuredimage->sub_image2_description = $request['sub_image2_description_subheader'];
        }


        //Sub Image 3
        if ($request->hasFile('sub_image3')){
            $file = $request->file('sub_image3');
            $name = $file->getClientOriginalName();
            $fileName = $name;
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

        if ($request->has('sub_image3_description_header')){
            $featuredimage->sub_image3_description = $request['sub_image3_description_header'];
        }

        if ($request->has('sub_image3_description_subheader')){
            $featuredimage->sub_image3_description = $request['sub_image3_description_subheader'];
        }

        //Sub Image 4
        if ($request->hasFile('sub_image4')){
            $file = $request->file('sub_image4');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image4 = $fileName;
            $featuredimage->sub_image4_description = $request['sub_image4_description'];
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

        if ($request->has('sub_image4_description_header')){
            $featuredimage->sub_image4_description = $request['sub_image4_description_header'];
        }

        if ($request->has('sub_image4_description_subheader')){
            $featuredimage->sub_image4_description = $request['sub_image4_description_subheader'];
        }

        //Sub Image 5
        if ($request->hasFile('sub_image5')){
            $file = $request->file('sub_image5');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image5 = $fileName;
            $featuredimage->sub_image5_description = $request['sub_image5_description'];
        }

       if ($request->has('sub_image5_description')){
            $featuredimage->sub_image5_description = $request['sub_image5_description'];
        }

        if ($request->has('sub_image5_description_header')){
            $featuredimage->sub_image5_description = $request['sub_image5_description_header'];
        }

        if ($request->has('sub_image5_description_subheader')){
            $featuredimage->sub_image5_description = $request['sub_image5_description_subheader'];
        }
        //Sub Image 6
        if ($request->hasFile('sub_image6')){
            $file = $request->file('sub_image6');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image6 = $fileName;
        }

        if ($request->has('sub_image6_description')){
            $featuredimage->sub_image6_description = $request['sub_image6_description'];
        }

        if ($request->has('sub_image6_description_header')){
            $featuredimage->sub_image6_description = $request['sub_image6_description_header'];
        }

        if ($request->has('sub_image6_description_subheader')){
            $featuredimage->sub_image6_description = $request['sub_image6_description_subheader'];
        }
        //Sub Image 7
        if ($request->hasFile('sub_image7')){
            $file = $request->file('sub_image7');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image7 = $fileName;
        }

        if ($request->has('sub_image7_description_header')){
            $featuredimage->sub_image7_description = $request['sub_image7_description_header'];
        }

        if ($request->has('sub_image7_description_subheader')){
            $featuredimage->sub_image7_description = $request['sub_image7_description_subheader'];
        }

        if ($request->has('sub_image7_description')){
            $featuredimage->sub_image7_description = $request['sub_image7_description'];
        }

        //Sub Image 8
       if ($request->hasFile('sub_image8')){
            $file = $request->file('sub_image8');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image8 = $fileName;
        }

        if ($request->has('sub_image8_description')){
            $featuredimage->sub_image8_description = $request['sub_image8_description'];
        }

        if ($request->has('sub_image8_description_header')){
            $featuredimage->sub_image8_description = $request['sub_image8_description_header'];
        }

        if ($request->has('sub_image8_description_subheader')){
            $featuredimage->sub_image8_description = $request['sub_image8_description_subheader'];
        }
         //Sub Image 9
        if ($request->hasFile('sub_image9')){
            $file = $request->file('sub_image9');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image9 = $fileName;
        }

       if ($request->has('sub_image9_description')){
            $featuredimage->sub_image9_description = $request['sub_image9_description'];
        }

        if ($request->has('sub_image9_description_header')){
            $featuredimage->sub_image9_description = $request['sub_image9_description_header'];
        }

        if ($request->has('sub_image9_description_subheader')){
            $featuredimage->sub_image9_description = $request['sub_image9_description_subheader'];
        }

        //Sub Image 10
        if ($request->hasFile('sub_image10')){
            $file = $request->file('sub_image10');
            $name = $file->getClientOriginalName();
            $fileName = $name;
            $file->move('image/uploaded_featured_image', $fileName);
            $featuredimage->sub_image10 = $fileName;
        }

        if ($request->has('sub_image10_description')){
            $featuredimage->sub_image10_description = $request['sub_image10_description'];
        }

        if ($request->has('sub_image10_description_header')){
            $featuredimage->sub_image10_description = $request['sub_image10_description_header'];
        }

        if ($request->has('sub_image10_description_subheader')){
            $featuredimage->sub_image10_description = $request['sub_image10_description_subheader'];
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
