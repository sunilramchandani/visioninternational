<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faq;
use App\FeaturedImage;

class faqController extends Controller
{
     public function index(){
        $featuredimage_faq = FeaturedImage::where('page_name','faq')->get();

     	$internship = faq::where('faq_type','Internship')->get();
     	$spring = faq::where('faq_type','Spring Work & Travel')->get();
     	$summer = faq::where('faq_type','Summer Work & Travel')->get();
     	$aupair = faq::where('faq_type','Au Pair')->get();
     	$faq_types = faq::distinct('state')->pluck('faq_type');

        return view('users.FAQ.faq', compact('featuredimage_faq', 'internship','summer','spring','aupair','faq_types'));
	}
	
	

    public function adminIndex()
    {
       $faq_table = faq::paginate(10);
       
       return view('admin.faq.list', compact('faq_table'));
    }


    public function adminCreate()
    {
       $faq = faq::all();
       $action = route('faq.adminStore');
       $method = "post";
       return view('admin.FAQ.form', compact('faq', 'action', 'method'));
    }


    public function adminEdit($id)
    {
       $faq = faq::findorFail($id);
       $action = route('faq.adminUpdate', $id);
       $method = "post";
       return view('admin.FAQ.form', compact('faq', 'action', 'method'));
    }



    public function adminStore(Request $request)
    {


        $faq = new faq;
        $faq->faq_type = $request['faq_type'];
        $faq->question = $request['question'];
        $faq->answer = $request['answer'];


        $faq->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('faq.adminIndex')->with($success);

    }

    public function adminUpdate(Request $request, $id)
    {
        $faq = faq::findorFail($id);

        $faq->faq_type = $request['faq_type'];
        $faq->question = $request['question'];
        $faq->answer = $request['answer'];



        $faq->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('faq.adminIndex')->with($success);

    }

    public function adminDelete($id)
    {
        $faq = faq::findorFail($id)->delete();
        $success = array('ok'=> 'Success');
        
        return redirect()->route('faq.adminIndex')->with($success);

    }
    public function viewTrash(){
        $faq_table = faq::onlyTrashed()->get();
        return view('admin.faq.trash', compact('faq_table'));
    }


    public function restoreTrash($id){
        $faq = faq::withTrashed()
        ->where('faq_id', $id)
        ->restore();
        $success = array('ok'=> 'Successfully Restored');
        return redirect()->back()->with($success);
    }

   
}
