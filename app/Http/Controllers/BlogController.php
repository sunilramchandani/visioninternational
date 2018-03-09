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
use App\CategoryList;
use App\BlogCategory;
use App\Jobs\SendNotificationJob;
use Mail;

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
        $blog_table = Blog::with('author');
        $author_name = Author::all();
        $category_list = CategoryList::all();
        $category_blog = BlogCategory::all();
        return view('admin.blogs.form', compact('blog_table', 'author_name', 'category_blog', 'category_list' ));

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
            'title' => '',
            'author_id'   => '',
            'body'   => '',
            'upload_blog_main_image' => 'mimes:jpeg,bmp,png'
            ]);

        $blog = new Blog;
        $blog->title = $request['title'];
        $blog->date = Carbon::now();
        $blog->author_id = $request['author_id'];
        $blog->body = $request['body'];
        $category_blog = new BlogCategory;
        $category_blog->category_id = $request['category_bulk'];
        $main_upload = new BlogMainImageUpload;
        $blog->save();

        $author_id = $request->input('author_id');
        
        $get_name = DB::table('author')
            ->where('author_id', $author_id)
            ->first()
            ->name;

    
        $title = $request->input('title');
        $author = $get_name;
        $body = $request->input('body');


        $this->dispatch(new SendNotificationJob($title, $author, $body ));

        if ($request->hasFile('upload_blog_main_image')){
            $id = $blog->id;
            $file = $request->file('upload_blog_main_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_main_blog_image', $fileName);
            $main_upload->image_name = $fileName;
            $main_upload->blog_id = $id;
            $main_upload->save();
        }


        if ($request->has('category_bulk'))
        {
            $category_list = $request->input('category_bulk');
            $id = $blog->id;
            foreach($category_list as $caca)
            {
            DB::table('category_blog')->insert([
                ['blog_id' => $id, 'category_id' => $caca, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }
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
        $blog = Blog::with('author')->findOrFail($id);

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
        $blog = Blog::with('blogcategory')->find($id);
        $author_name = Author::all();

        $blog_id = DB::table('blog')
        ->where('id', $id)
        ->first()
        ->author_id;

        $author_id = Author::where('author_id', $blog_id)->first()->author_id;

        
        $getid_blog = DB::table('category_blog')
            ->where('blog_id', $id)
            ->pluck('category_id');
        
        $category_list = DB::table('category_list')
            ->wherenotIn('id', $getid_blog)
            ->get();


        
        $category_blog = BlogCategory::all();
        return view('admin.blogs.edit', compact('author_id','blog', 'author_name', 'category_blog', 'category_list' ));
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
            'title' => '',
            'author_id'   => '',
            'body'   => '',
        ]);
            
        $blog = Blog::findOrFail($id);
        $blog->title = $request['title'];
        $blog->date = Carbon::now();
        $blog->author_id = $request['author_id'];
        $blog->body = $request['body'];

        $category_blog = new BlogCategory;
        $category_blog->category_id = $request['category_bulk'];
        
        $blog->save();
        
        if ($request->has('category_bulk'))
        {
        $category_list = $request->input('category_bulk');
        foreach($category_list as $caca)
        {

        DB::table('category_blog')->insert([
            ['blog_id' => $id, 'category_id' => $caca, 'updated_at' => Carbon::now()]
        ]);
        }
        }


        $success = array('ok'=> 'Success');
        
        return redirect()->route('blog.index')->with($success);
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

    public function userIndex(Request $request){

        
        if (request()->has('category_id')){

            $s = $request->input('s');

            

            $category_blog = BlogCategory::where('category_id', request('category_id'))->pluck('blog_id');

            $blog_table = Blog::with('author', 'mainimageupload', 'blogcategory')
                    ->orderBy('created_at', 'desc')
                    ->search($s)
                    ->whereIn('id', $category_blog)
                    ->paginate(1);
            
            $category_table = CategoryList::withCount('blogcategorytable')->get();
                    
            $featuredimage_blog = FeaturedImage::where('page_name','blog')->get();

  
            return view('users.blog.main_blog', compact('blog_table', 'author_name', 'featuredimage_blog', 'category_table', 's'));

        }
        else{

            $s = $request->input('s');

            $blog_table = Blog::with('author', 'mainimageupload', 'blogcategory')
                            ->orderBy('created_at', 'desc')
                            ->search($s)
                            ->paginate(5);
            
            $category_table = CategoryList::withCount('blogcategorytable')->get();

            $featuredimage_blog = FeaturedImage::where('page_name','blog')->get();
    
            return view('users.blog.main_blog', compact('blog_table', 'author_name', 'featuredimage_blog', 'category_table', 's'));
        }
        
        
    }

    public function userSingle($id)
    {

        
        $previous_blog = $id - 1;
        $next_blog = $id + 1;

        $blog = Blog::find($id);  
        $previousblog = Blog::find($previous_blog);  
        $nextblog = Blog::find($next_blog); 
        

        $blog_table = Blog::with('author', 'mainimageupload', 'blogcategory')->orderBy('created_at', 'desc')->get();


        $categories = DB::table('category_blog')
        ->where('blog_id', $id)
        ->join('category_list', 'category_list.id', '=', 'category_blog.category_id')
        ->select('category_blog.*', 'category_list.category_name')
        ->get();

        $category_table = CategoryList::withCount('blogcategorytable')->get();

        $featuredimage_blog = FeaturedImage::where('page_name','blog')->get();

       
        
        return view('users.blog.single_blog', compact('featuredimage_blog', 'blog_table', 'previousblog','nextblog', 'blog', 'category_table', 'category_count', 'categories'));
    }

    public function indexMainUpload($id){
        $blog = Blog::find($id);
        
        $main_upload = BlogMainImageUpload::where('blog_id', $id)->get();
        
        return view('admin.blogs.image-upload-view', compact('blog', 'main_upload'));
    }

    public function storeMainUpload($id, Request $request){

        $this->validate($request, [
            'upload_blog_main_image' => 'mimes:jpeg,bmp,png'
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

     public function deleteBlogCategory($id)
    {

        
        $blogcategory = BlogCategory::find($id)->delete();
        
            return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);

    }

    

    

}