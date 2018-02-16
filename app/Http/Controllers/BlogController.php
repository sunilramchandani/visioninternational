<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Author;
use App\FeaturedImage;
use Carbon\Carbon;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog_table = Blog::all();
        $author_name = Author::all();
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
        $blog = new Blog;
        $blog->title = $request['title'];
        $blog->date = Carbon::now();
        $blog->author_id = $request['author_id'];
        $blog->body = $request['body'];
        $blog->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('blog.create')->with($success);
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

    public function userIndex(){
        $blog_table = Blog::all();
        $featuredimage_blog = FeaturedImage::where('page_name','blog')->get();
        $author_name = Author::all();
        return view('users.blog.main_blog', compact('blog_table', 'author_name', 'featuredimage_blog'));
    }

}
