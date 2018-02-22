<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Author;
use App\CategoryList;
use Carbon\Carbon;
use App\QualificationList;
use App\OpportunityList;

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
            'upload_author_image' => 'mimes:jpeg,bmp,png|required',
            'description'   => 'required',
            ]);

        $author = new Author;
        $author->name = $request['name'];

        if ($request->hasFile('upload_author_image')){
            $file = $request->file('upload_author_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('../storage/app/public/upload_author_image', $fileName);
            $author->image = $fileName;
        }

        $author->description = $request['description'];
        $author->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('author.list')->with($success);
        
    }

    public function editAuthor($id)
    {
        $author = Author::findOrFail($id);
        return view('admin.subdata.author_edit', compact('author'));

    }

    public function updateAuthor($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'upload_author_image' => 'mimes:jpeg,bmp,png',
            'description'   => 'required',
        ]);

        $author = Author::find($id);
        $author->name = $request['name'];
        if ($request->hasFile('upload_author_image')){
            $file = $request->file('upload_author_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('../storage/app/public/upload_author_image', $fileName);
            $author->image = $fileName;
        }

        $author->description = $request['description'];
        $author->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('author.list')->with($success);;

    }

    public function deleteAuthor($id, Request $request)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        $success = array('ok'=> 'Successfully Deleted');
        
        return redirect()->route('author.list')->with($success);

    }

    public function indexCategory()
    {
        $category_table = CategoryList::orderBy('category_name','asc')->paginate(10);
        return view('admin.subdata.category', compact('category_table'));
    }


    public function storeCategory(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            ]);

        $category = new CategoryList;
        $category->category_name = $request['category_name'];
        $category->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('category.list')->with($success);
        
    }

    public function deleteCategory($id)
    {
        $category = CategoryList::findOrFail($id);

        $category->delete();

        $success = array('ok'=> 'Successfully Deleted');
        
        return redirect()->route('category.list')->with($success);
        
    }

    public function editCategory($id, Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);


        $category = CategoryList::find($id);
        $category->category_name = $request['category_name'];
        $category->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('category.list')->with($success);

    }

    public function indexQualification()
    {
        $qualification_table = QualificationList::orderBy('qualification_name','asc')->paginate(10);
        return view('admin.subdata.qualification', compact('qualification_table'));
    }


    public function storequalification(Request $request)
    {
        $this->validate($request, [
            'qualification_name' => 'required',
            ]);

        $qualification = new QualificationList;
        $qualification->qualification_name = $request['qualification_name'];
        $qualification->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('qualification.list')->with($success);
        
    }

    public function deletequalification($id)
    {
        $qualification = QualificationList::findOrFail($id);

        $qualification->delete();

        $success = array('ok'=> 'Successfully Deleted');
        
        return redirect()->route('qualification.list')->with($success);
        
    }

    public function editQualification($id, Request $request)
    {
        $this->validate($request, [
            'qualification_name' => 'required',
        ]);


        $qualification = QualificationList::find($id);
        $qualification->qualification_name = $request['qualification_name'];
        $qualification->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('qualification.list')->with($success);

    }

    public function indexOpportunity()
    {
        $opportunity_table = OpportunityList::orderBy('opportunity_name','asc')->paginate(10);
        return view('admin.subdata.opportunity', compact('opportunity_table'));
    }


    public function storeOpportunity(Request $request)
    {
        $this->validate($request, [
            'opportunity_name' => 'required',
            ]);

        $opportunity = new OpportunityList;
        $opportunity->opportunity_name = $request['opportunity_name'];
        $opportunity->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('opportunity.list')->with($success);
        
    }

    public function deleteOpportunity($id)
    {
        $opportunity = OpportunityList::findOrFail($id);

        $opportunity->delete();

        $success = array('ok'=> 'Successfully Deleted');
        
        return redirect()->route('opportunity.list')->with($success);
        
    }

    public function editOpportunity($id, Request $request)
    {
        $this->validate($request, [
            'opportunity_name' => 'required',
        ]);


        $opportunity = OpportunityList::find($id);
        $opportunity->opportunity_name = $request['opportunity_name'];
        $opportunity->start_date = $request['start_date'];
        $opportunity->end_date = $request['end_date'];
        $opportunity->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('opportunity.list')->with($success);

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
