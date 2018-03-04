<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageStep;   
use Carbon\Carbon;
class PageStepController extends Controller
{
    
    public function adminIndex()
    {
       $page_step_table = PageStep::paginate(12);
       return view('admin.page_step.list', compact('page_step_table'));
    }


    public function adminEdit($id)
    {
       $page_step = PageStep::findorFail($id);
       $action = route('page_step.adminUpdate', $id);
       $method = "post";
       return view('admin.page_step.form', compact('page_step', 'action', 'method'));
    }


    public function adminUpdate(Request $request, $id)
    {
        $page_step = PageStep::findorFail($id);

        $page_step->step_number = $request['step_number'];


        if ($request->hasFile('upload_step_image')){
            $file = $request->file('upload_step_image');
            $name = $file->getClientOriginalName();
            $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
            $file->move('image/uploaded_step_image', $fileName);
            $page_step->image = $fileName;
        }

       
        $page_step->image_title = $request['image_title'];
        $page_step->image_description = $request['image_description'];
        $page_step->description = $request['description'];
        $page_step->sub_description = $request['sub_description'];

        if ($request->hasFile('button_name')){
            $page_step->button_name = $request['button_name'];
        }
        

        $page_step->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('page_step.adminIndex')->with($success);

    }

}
