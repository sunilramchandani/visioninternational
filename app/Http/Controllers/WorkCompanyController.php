<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkCompany;
use App\WorkOpportunity;
use App\WorkQualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\WorkDuration;
use App\WorkIndustry;
use App\FeaturedImage;
use App\QualificationList;
use App\OpportunityList;
use App\Qualification;
use App\Opportunity;
use App\Lib\WorkCompanyLib;

use App\Models\Testimonials;
use App\Models\Programs;



class WorkCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $internshipCompany_table_filter_state = WorkCompany::groupBy('state')->get();
        $internshipCompany_table_filter_industry = WorkIndustry::groupBy('industry_name')->get();
        $internshipCompany_table_filter_duration = WorkDuration::groupBy('duration_start_date')->get();
        


        $get_testimonial = DB::table('featuredimage')
        ->where('page_name', 'work')
        ->first()
        ->testimonial_id;

        $testimonial = Testimonials::where('id', $get_testimonial)->get();


        if (request()->has('id')){
            $featuredimage_internship = FeaturedImage::where('page_name','Work')->get();
            $internshipCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->orderBy('id','asc')->get();

            
            $internship_addresses = WorkCompany::where('id', request('id'))->pluck('housing_address');
            $internship_name = WorkCompany::where('id', request('id'))->pluck('id');
            $internship_desc = WorkCompany::where('id', request('id'))->pluck('description');
            $internship_filter = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
            $internship_id = WorkCompany::where('id', request('id'))->pluck('id');
            $internship_image = WorkCompany::pluck('image');
            $internship_featured = WorkCompany::where('id', request('id'))->orderBy('featured','desc')->pluck('featured');

            $internship_latitude = WorkCompany::where('id', request('id'))->orderBy('featured','desc')->pluck('latitude');
            $internship_longtitude = WorkCompany::where('id', request('id'))->orderBy('featured','desc')->pluck('longtitude');


            return view('users.work.work', compact('internshipCompany_table_filter_state', 'internshipCompany_table_filter_industry', 'internshipCompany_table_filter_duration', 'internship_longtitude','internship_latitude','testimonial', 'featuredimage_internship', 'internshipCompany_table', 'internship_filter','internship_addresses','internship_name','internship_desc','internship_id', 'internship_image','internship_featured'));
        }

        else if (request()->has('country')){

            
            $featuredimage_internship = FeaturedImage::where('page_name','Work')->get();
            $internshipCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->orderBy('featured','desc')->where('country', request('country'))->paginate(4)->appends('country', request('country'));

            
            $internship_addresses = WorkCompany::where('country', request('country'))->orderBy('featured','desc')->pluck('housing_address');
            $internship_name = WorkCompany::where('country', request('country'))->orderBy('featured','desc')->pluck('company_name');
            $internship_desc = WorkCompany::where('country', request('country'))->orderBy('featured','desc')->pluck('description');
            $internship_filter = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
            $internship_id = WorkCompany::where('country', request('country'))->orderBy('featured','desc')->pluck('id');
            $internship_image = WorkCompany::orderBy('featured','desc')->pluck('image');
             $internship_featured = WorkCompany::where('country', request('country'))->orderBy('featured','desc')->pluck('featured');

             $internship_latitude = WorkCompany::where('country', request('country'))->orderBy('featured','desc')->pluck('latitude');
            $internship_longtitude = WorkCompany::where('country', request('country'))->orderBy('featured','desc')->pluck('longtitude');


            return view('users.work.work', compact('internshipCompany_table_filter_state', 'internshipCompany_table_filter_industry', 'internshipCompany_table_filter_duration', 'internship_longtitude','internship_latitude','testimonial','featuredimage_internship', 'internshipCompany_table', 'internship_filter','internship_addresses','internship_name','internship_desc','internship_id', 'internship_image','internship_featured'));
        }
        else if (request()->has('duration')){

            
            $featuredimage_internship = FeaturedImage::where('page_name','Work')->get();
            $internshipCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->orderBy('featured','desc')->where('duration', request('duration'))->paginate(4)->appends('duration', request('duration'));

            
            $internship_addresses = WorkCompany::where('duration', request('duration'))->orderBy('featured','desc')->pluck('housing_address');
            $internship_name = WorkCompany::where('duration', request('duration'))->orderBy('featured','desc')->pluck('company_name');
            $internship_desc = WorkCompany::where('duration', request('duration'))->orderBy('featured','desc')->pluck('description');
            $internship_filter = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
            $internship_id = WorkCompany::where('duration', request('duration'))->orderBy('featured','desc')->pluck('id');
            $internship_image = WorkCompany::orderBy('featured','desc')->pluck('image');
            $internship_featured = WorkCompany::where('duration', request('duration'))->orderBy('featured','desc')->pluck('featured');


            $internship_latitude = WorkCompany::where('duration', request('duration'))->orderBy('featured','desc')->pluck('latitude');
            $internship_longtitude = WorkCompany::where('duration', request('duration'))->orderBy('featured','desc')->pluck('longtitude');
            return view('users.work.work', compact('internshipCompany_table_filter_state', 'internshipCompany_table_filter_industry', 'internshipCompany_table_filter_duration', 'internship_longtitude','internship_latitude','testimonial','featuredimage_internship', 'internshipCompany_table', 'internship_filter','internship_addresses','internship_name','internship_desc','internship_id', 'internship_image','internship_featured'));
        }
        else if (request()->has('state')){

            
            $featuredimage_internship = FeaturedImage::where('page_name','Work')->get();
            $internshipCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->orderBy('featured','desc')->where('state', request('state'))->paginate(4)->appends('state', request('state'));

            
            $internship_addresses = WorkCompany::where('state', request('state'))->orderBy('featured','desc')->pluck('housing_address');
            $internship_name = WorkCompany::where('state', request('state'))->orderBy('featured','desc')->pluck('company_name');
            $internship_desc = WorkCompany::where('state', request('state'))->orderBy('featured','desc')->pluck('description');
            $internship_filter = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
            $internship_id = WorkCompany::where('state', request('state'))->orderBy('featured','desc')->pluck('id');
            $internship_image = WorkCompany::orderBy('featured','desc')->pluck('image');
            $internship_featured = WorkCompany::orderBy('featured','desc')->pluck('featured');
            
            $internship_latitude = WorkCompany::where('state', request('state'))->orderBy('featured','desc')->pluck('latitude');
            $internship_longtitude = WorkCompany::where('state', request('state'))->orderBy('featured','desc')->pluck('longtitude');


            return view('users.work.work', compact('internshipCompany_table_filter_state', 'internshipCompany_table_filter_industry', 'internshipCompany_table_filter_duration', 'internship_longtitude','internship_latitude','internship_featured','testimonial', 'featuredimage_internship', 'internshipCompany_table', 'internship_filter','internship_addresses','internship_name','internship_desc','internship_id', 'internship_image'));
        }

        else{
            $featuredimage_internship = FeaturedImage::where('page_name','Work')->get();
            $internshipCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->orderBy('featured','desc')->get();
            $internship_filter = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
            $internship_addresses = WorkCompany::orderBy('featured','desc')->pluck('housing_address');
            $internship_name = WorkCompany::orderBy('featured','desc')->pluck('company_name');
            $internship_desc = WorkCompany::orderBy('featured','desc')->pluck('description');
            $internship_id = WorkCompany::orderBy('featured','desc')->pluck('id');
            $internship_image = WorkCompany::orderBy('featured','desc')->pluck('image');
            $internship_featured = WorkCompany::orderBy('featured','desc')->pluck('featured');

            $internship_latitude = WorkCompany::orderBy('featured','desc')->pluck('latitude');
            $internship_longtitude = WorkCompany::orderBy('featured','desc')->pluck('longtitude');

            return view('users.work.work', compact('internshipCompany_table_filter_state', 'internshipCompany_table_filter_industry', 'internshipCompany_table_filter_duration', 'internship_longtitude','internship_latitude','testimonial','featuredimage_internship', 'internshipCompany_table','internship_addresses','internship_name','internship_desc','internship_id','internship_image','internship_featured','internship_filter'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function adminCreate()
    {
    
    $error = false;
    $action = route('workcompany.save');
    $qualification_list = QualificationList::all();
    $opportunity_list = OpportunityList::all();

    if(request()->isMethod('post')) {
        $data = request()->all();

        $result = WorkCompanyLib::create($data);

        if ($result) {
            return redirect()
                ->route('workcompany.list')
                ->with('flash', [
                    'type' => 'success',
                    'message' => 'Successfully Added'
                ]);
        }
    }

    return view('admin.work_company.form', [
        'error' => $error,
        'action' => $action,
        'qualification_list' => $qualification_list,
        'opportunity_list' => $opportunity_list,
    ]);
    }

    public function adminEdit($id){
        $company = WorkCompanyLib::getById($id);
        $error = false;

        $getid_qualification = DB::table('work_qualifications')
            ->where('company_id', $id)
            ->pluck('qualification_id');
        
        $qualification_list = DB::table('qualification_list')
            ->wherenotIn('id', $getid_qualification)
            ->get();

        $getid_opportunity = DB::table('work_opportunity')
            ->where('company_id', $id)
            ->pluck('opportunity_id');
        
        $opportunity_list = DB::table('opportunity_list')
            ->wherenotIn('id', $getid_opportunity)
            ->get();



        if (!$company) {
            return redirect()->route('workcompany.list')->with('flash', [
                'type' => 'danger',
                'message' => 'Invalid Company'
            ]);
        }

        if (request()->isMethod('post')) {
            $data = request()->all();

            $result = WorkCompanyLib::update($id, $data);

            if (!$result) {
                $error = [
                    'type' => 'danger',
                    'message' => 'Something went wrong while updating program'
                ];
            } else {
                return redirect()->route('workcompany.list')->with('flash', [
                    'type' => 'success',
                    'message' => 'Company was successfully updated'
                ]);
            }
        }

        $action = route('workcompany.saveadminedit', $id);

        return view('admin.work_company.form', [
            'company' => $company,
            'action' => $action,
            'qualification_list' => $qualification_list,
            'opportunity_list' => $opportunity_list,
            'error' => $error
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $limit = request()->get('limit', 10);
        $current_page = request()->get('page', 1);


        $params = [
            'limit' => $limit,
            'current_page' => $current_page
        ];

        $pagination = WorkCompanyLib::getPaginated($params);
        $company = $pagination->items();


        return view('admin.work_company.list', [
            'company' => $company,
            'paginator' => $pagination
        ]);
    }



    public function delete($id)
    {
        $company = WorkCompanyLib::getById($id);

        $data = [
            'type' => 'success',
            'message' => 'Successfully Deleted'
        ];

        $result = $company->delete();
        if(!$result) {
            $data['type'] = 'danger';
            $data['message'] = 'Invalid Company';
        }

        return redirect()->route('workcompany.list')->with('flash', $data);
    }

    public function view($id)
    {
        $company = WorkCompany::with('work_qualifications', 'work_opportunity')->find($id); 


        if(!$company) {
           return redirect()->route('workcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Company'
           ]);
        }

        return view('admin.work_company.view', [ 'company' => $company]);
    }

    public function createOpportunity($id)
    {
        $company = WorkCompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('workcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Company'
           ]);
        }

        return view('admin.work_company.opportunity', [ 'company' => $company]);
    }

    public function storeOpportunity($id, Request $request)
    {
        $company = WorkCompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('workcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Company'
           ]);
        }

        $work_opportunity = new WorkOpportunity();
        $work_opportunity->company_id = $id;
        $work_opportunity->opportunity_name = $request['opportunity_name'];
        $work_opportunity->status = "Inactive";
        $work_opportunity->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('work_company.view')->with($success);
    }

    public function deleteOpportunity($id)
    {

        
        $opportunity = WorkOpportunity::find($id)->delete();
        
            return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);

    }

    public function deleteQualification($id)
    {

        
        $qualification = WorkQualification::find($id)->delete();
        
            return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);

    }


    public function createQualification($id)
    {
        $company = WorkCompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('workcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Qualification'
           ]);
        }

        return view('admin.work_company.qualification', [ 'company' => $company]);
    }

    public function storeQualification($id, Request $request)
    {
        $company = WorkCompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('workcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Qualification'
           ]);
        }

        $work_qualification = new WorkQualification();
        $work_qualification->company_id = $id;
        $work_qualification->qualification = $request['qualification'];
        $work_qualification->status = "Inactive";
        $work_qualification->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('workcompany.list')->with($success);
    }

    public function durationIndex()
    {
        $duration_table = WorkDuration::all();
        return view('admin.work_company.duration.list', compact('duration_table'));
    }

    public function createDuration($id)
    {
        $duration = WorkDuration::find($id);
        return view('admin.work_company.duration.form', compact('duration'));
    }

    public function storeDuration($id, Request $request)
    {

        $duration = WorkDuration::find($id);
        $duration->duration_months	 = $request['duration_months'];
        $duration->duration_price = $request['duration_price'];
        $duration->duration_start_date = $request['duration_start_date'];
        $duration->save();

        $success = array('ok'=> 'Success');
        return redirect()->route('workcompany.durationList')->with($success);
    }

    public function viewTrash(){
        $company = WorkCompany::onlyTrashed()->get();
        return view('admin.work_company.trash', compact('company'));
    }


    public function restoreTrash($id){
        $company = WorkCompany::withTrashed()
        ->where('id', $id)
        ->restore();
        $success = array('ok'=> 'Successfully Restored');
        return redirect()->back()->with($success);
    }

    
}
