<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Author;
use App\CategoryList;
use Carbon\Carbon;

class SubDataController extends Controller
{
    // Custom Functions (AUTHOR)

    public function indexAuthor()
    {
        $author_table = Author::orderBy('created_at','desc')->paginate(5);
        return view('admin.subdata.author_list', compact('author_table'));
    }

    public function createAuthor()
    {
        $author_table = Author::all();
        return view('admin.subdata.author_create', compact('author_table'));

    }

    public function storeAuthor(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'upload_author_image' => 'required',
            'description'   => 'required',
            ]);

        $author = new Author;
        $author->name = $request['name'];

        if ($request->hasFile('upload_author_image')){
            $file = $request->file('upload_author_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('../storage/app/upload_author_image', $fileName);
            $author->image = $fileName;
        }

        $author->description = $request['description'];
        $author->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('blog.index')->with($success);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
}
