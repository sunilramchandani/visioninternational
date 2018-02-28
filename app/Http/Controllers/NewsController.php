<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Author;
use App\FeaturedImage;
use Carbon\Carbon;
use App\NewsMainImageUpload;
use Storage;
use File;
use App\CategoryList;
use App\NewsCategory;
use App\Jobs\SendNotificationJob;
use Mail;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_table = News::with('author')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.list', compact('news_table', 'author_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news_table = News::all();
        $author_name = Author::all();
        $category_list = CategoryList::all();
        $category_news = NewsCategory::all();
        return view('admin.news.form', compact('news_table', 'author_name', 'category_news', 'category_list' ));
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
            'upload_news_main_image' => 'mimes:jpeg,bmp,png'
            ]);

        $news = new News;
        $news->title = $request['title'];
        $news->date = Carbon::now();
        $news->author_id = $request['author_id'];
        $news->body = $request['body'];
        $category_news = new NewsCategory;
        $category_news->category_id = $request['category_bulk'];
        $main_upload = new NewsMainImageUpload;

        

        $news->save();

        $author_id = $request->input('author_id');
        
        $get_name = DB::table('author')
            ->where('author_id', $author_id)
            ->first()
            ->name;

    
        $title = $request->input('title');
        $author = $get_name;
        $body = $request->input('body');


        $this->dispatch(new SendNotificationJob($title, $author, $body ));

        if ($request->hasFile('upload_news_main_image')){
            $id = $news->id;
            $file = $request->file('upload_news_main_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_main_news_image', $fileName);
            $main_upload->image_name = $fileName;
            $main_upload->news_id = $id;
            $main_upload->save();
        }


        if ($request->has('category_bulk'))
        {
            $category_list = $request->input('category_bulk');
            $id = $news->id;
            foreach($category_list as $caca)
            {
            DB::table('category_news')->insert([
                ['news_id' => $id, 'category_id' => $caca, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
            ]);
            }
        }
        $success = array('ok'=> 'Success');
        
        return redirect()->route('news.index')->with($success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

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
        $news = News::with('author')->findOrFail($id);
        $author_name = Author::all();

        $news_id = DB::table('news_v2')
        ->where('id', $id)
        ->first()
        ->author_id;

        $author_id = Author::where('author_id', $news_id)->first()->author_id;

        
        $getid_news = DB::table('category_news')
            ->where('news_id', $id)
            ->pluck('category_id');
        
        $category_list = DB::table('category_list')
            ->wherenotIn('id', $getid_news)
            ->get();


        
        $category_news = NewsCategory::all();
        return view('admin.news.edit', compact('author_id','news', 'author_name', 'category_news', 'category_list' ));
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
            
        $news = News::findOrFail($id);
        $news->title = $request['title'];
        $news->date = Carbon::now();
        $news->author_id = $request['author_id'];
        $news->body = $request['body'];

        $category_news = new NewsCategory;
        $category_news->category_id = $request['category_bulk'];
        
        $news->save();
        
        if ($request->has('category_bulk'))
        {
        $category_list = $request->input('category_bulk');
        foreach($category_list as $caca)
        {

        DB::table('category_news')->insert([
            ['news_id' => $id, 'category_id' => $caca, 'updated_at' => Carbon::now()]
        ]);
        }
        }


        $success = array('ok'=> 'Success');
        
        return redirect()->route('news.index')->with($success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        $success = array('ok'=> 'Successfully Deleted ( View Trash to Restore )');
        
        return redirect()->back()->with($success);
    }

    //custom functions

    public function userIndex(Request $request){
        if (request()->has('category_id')){

            $s = $request->input('s');

            

            $category_news = NewsCategory::where('category_id', request('category_id'))->pluck('news_id');

            $news_table = News::with('author', 'mainimageupload', 'newscategory')
                    ->orderBy('created_at', 'desc')
                    ->search($s)
                    ->whereIn('id', $category_news)
                    ->paginate(5);
            
            $category_table = CategoryList::withCount('newscategorytable')->get();
                    
            $featuredimage_news = FeaturedImage::where('page_name','news')->get();

  
            return view('users.news.main_news', compact('news_table', 'author_name', 'featuredimage_news', 'category_table', 's'));

        }
        else{

            $s = $request->input('s');

            $news_table = News::with('author', 'mainimageupload', 'newscategory')
                            ->orderBy('created_at', 'desc')
                            ->search($s)
                            ->paginate(5);
            
            $category_table = CategoryList::withCount('newscategorytable')->get();

            $featuredimage_news = FeaturedImage::where('page_name','news')->get();
    
            return view('users.news.main_news', compact('news_table', 'author_name', 'featuredimage_news', 'category_table', 's'));
        }
        
        
    }

    public function userSingle($id)
    {

        
        $previous_news = $id - 1;
        $next_news = $id + 1;

        $news = News::find($id);  
        $previousnews = News::find($previous_news);  
        $nextnews = News::find($next_news); 
        

        $news_table = News::with('author', 'mainimageupload', 'newscategory')->orderBy('created_at', 'desc')->get();


        $categories = DB::table('category_news')
        ->where('news_id', $id)
        ->join('category_list', 'category_list.id', '=', 'category_news.category_id')
        ->select('category_news.*', 'category_list.category_name')
        ->get();

        $category_table = CategoryList::withCount('newscategorytable')->get();

       
        
        return view('users.news.single_news', compact('news_table', 'previousnews','nextnews', 'news', 'category_table', 'category_count', 'categories'));
    }

    public function indexMainUpload($id){
        $news = News::find($id);
        
        $main_upload = NewsMainImageUpload::where('news_id', $id)->get();
        
        return view('admin.news.image-upload-view', compact('news', 'main_upload'));
    }

    public function storeMainUpload($id, Request $request){

        $this->validate($request, [
            'upload_news_main_image' => 'mimes:jpeg,bmp,png'
        ]);

        $main_upload = News::find($id);
        $main_upload = new NewsMainImageUpload;
        $main_upload->news_id = $id;

        if ($request->hasFile('upload_news_main_image')){
            $file = $request->file('upload_news_main_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_main_news_image', $fileName);
    
            $main_upload->image_name = $fileName;
        }
        $main_upload->save();
        $success = array('ok'=> 'Success');
        
        return redirect()->back()->with($success);
    }

    public function deleteMainUpload($id){
        $main_upload = NewsMainImageUpload::findOrFail($id);

        $filename = DB::table('news_main_image')
        ->where('id', $id)
        ->first()
        ->image_name;

        $image_path = "image/uploaded_main_news_image/$filename";


        File::delete($image_path);


        $main_upload->delete();

        $success = array('ok'=> 'Successfully Deleted');
        
        return redirect()->back()->with($success);
    }



    public function viewTrash(){
        $news_trash = News::onlyTrashed()->get();
        return view('admin.news.trash', compact('news_trash'));
    }


    public function restoreTrash($id){
        $news_trash = News::withTrashed()
        ->where('id', $id)
        ->restore();
        $success = array('ok'=> 'Successfully Restored');
        return redirect()->back()->with($success);
    }
}
