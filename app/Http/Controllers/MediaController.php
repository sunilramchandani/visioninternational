<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Author;
use Illuminate\Support\Facades\DB;
use App\FeaturedImage;
class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $featuredimage_media = FeaturedImage::where('page_name','media')->get();
        $media_table = Media::with('author')->get();
         return view('users.media.media', compact('featuredimage_media', 'media_table'));
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
        if (request()->has('media_type')){
        $media_table = Media::orderBy('created_at','desc')->where('media_type', request('media_type'))->paginate(10)->appends('media_type', request('media_type'));
        
        $media_get = Media::select('media_type')->get();

        
        return view('admin.media.list', compact('media_get', 'media_table'));
        }

        else{
        $media_table = Media::paginate(10);
        return view('admin.media.list', compact('media_table'));
        }
    }


    public function adminCreate()
    {
       $media = Media::all();

       $media_title = Media::select('media_title')->get();


       $author_name = Author::all();
       $action = route('media.adminStore');
       $method = "post";
       return view('admin.media.form', compact('author_name', 'media', 'action', 'method'));
    }


    public function adminEdit($id)
    {
       $media = Media::with('author')->findorFail($id);

       $media_id = DB::table('media')
        ->where('media_id', $id)
        ->first()
        ->media_author;

       $author_name = Author::all();


       $author_id = Author::where('author_id', $media_id)->first()->author_id;



       $action = route('media.adminUpdate', $id);
       $method = "post";
       return view('admin.media.form', compact('author_id', 'author_name','media', 'action', 'method'));
    }



    public function adminStore(Request $request)
    {


        $media = new Media;
        $media->media_title = $request['media_title'];
        $media->media_type = $request['media_type'];
        $media->media_link = $request['media_link'];
        $media->media_album_link = $request['media_album_link'];
        $media->media_description = $request['media_description'];
        $media->media_author = $request['media_author'];



        $media->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('media.adminIndex')->with($success);

    }

    public function adminUpdate(Request $request, $id)
    {
        $media = Media::findorFail($id);

        $media->media_title = $request['media_title'];
        $media->media_type = $request['media_type'];
        $media->media_link = $request['media_link'];
        $media->media_album_link = $request['media_album_link'];
        $media->media_description = $request['media_description'];
        $media->media_author = $request['media_author'];

        $media->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('media.adminIndex')->with($success);

    }

    public function adminDelete($id)
    {
        $media = Media::findorFail($id)->delete();
        $success = array('ok'=> 'Success');
        
        return redirect()->route('media.adminIndex')->with($success);

    }
    public function viewTrash(){
        $media_table = Media::onlyTrashed()->get();
        return view('admin.media.trash', compact('media_table'));
    }


    public function restoreTrash($id){
        $media = Media::withTrashed()
        ->where('media_id', $id)
        ->restore();
        $success = array('ok'=> 'Successfully Restored');
        return redirect()->back()->with($success);
    }


}
