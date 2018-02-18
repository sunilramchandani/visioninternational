<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Author;
use App\FeaturedImage;
use Carbon\Carbon;
use App\BlogMainImageUpload;
use Storage;
use File;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_table = Blog::with('author')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.list', compact('blog_table', 'author_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_table = Blog::all();
        $author_name = Author::all();
        return view('admin.blogs.form', compact('blog_table', 'author_name'));

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
            'title' => 'required',
            'author_id'   => 'required',
            'body'   => 'required',
            ]);

        $blog = new Blog;
        $blog->title = $request['title'];
        $blog->date = Carbon::now();
        $blog->author_id = $request['author_id'];
        $blog->body = $request['body'];
        $blog->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('blog.index')->with($success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        $success = array('ok'=> 'Successfully Deleted ( View Trash to Restore )');
        
        return redirect()->back()->with($success);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $author_name = Author::all();
        return view('admin.blogs.edit', compact('blog', 'author_name'));
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
        $this->validate($request, [
            'title' => 'required',
            'author_id'   => 'required',
            'body'   => 'required',
        ]);
            
        $blog = Blog::findOrFail($id);
        $blog->title = $request['title'];
        $blog->date = Carbon::now();
        $blog->author_id = $request['author_id'];
        $blog->body = $request['body'];
        $blog->save();

        $success = array('ok'=> 'Success');
        
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
        $blog = Blog::findOrFail($id);

        $blog->delete();

        $success = array('ok'=> 'Successfully Deleted ( View Trash to Restore )');
        
        return redirect()->back()->with($success);
    }

    //custom functions

    public function userIndex(){
        $blog_table = Blog::with('author', 'mainimageupload')->orderBy('created_at', 'desc')->get();
        $featuredimage_blog = FeaturedImage::where('page_name','blog')->get();
        return view('users.blog.main_blog', compact('blog_table', 'author_name', 'featuredimage_blog'));
    }

    public function indexMainUpload($id){
        $blog = Blog::find($id);
        
        $main_upload = BlogMainImageUpload::where('blog_id', $id)->get();
        
        return view('admin.blogs.image-upload-view', compact('blog', 'main_upload'));
    }

    public function storeMainUpload($id, Request $request){

        $this->validate($request, [
            'upload_blog_main_image' => 'mimes:jpeg,bmp,png|required'
        ]);

        $main_upload = Blog::find($id);
        $main_upload = new BlogMainImageUpload;
        $main_upload->blog_id = $id;

        if ($request->hasFile('upload_blog_main_image')){
            $file = $request->file('upload_blog_main_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_main_blog_image', $fileName);
    
            $main_upload->image_name = $fileName;
        }
        $main_upload->save();
        $success = array('ok'=> 'Success');
        
        return redirect()->back()->with($success);
    }

    public function deleteMainUpload($id){
        $main_upload = BlogMainImageUpload::findOrFail($id);

        $filename = DB::table('blog_main_image')
        ->where('id', $id)
        ->first()
        ->image_name;

        $image_path = "image/uploaded_main_blog_image/$filename";


        File::delete($image_path);


        $main_upload->delete();

        $success = array('ok'=> 'Successfully Deleted');
        
        return redirect()->back()->with($success);
    }

    public function viewTrash(){
        $blog_trash = Blog::onlyTrashed()->get();
        return view('admin.blogs.trash', compact('blog_trash'));
    }


    public function restoreTrash($id){
        $blog_trash = Blog::withTrashed()
        ->where('id', $id)
        ->restore();
        $success = array('ok'=> 'Successfully Restored');
        return redirect()->back()->with($success);
    }

    

}
