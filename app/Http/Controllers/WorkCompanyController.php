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


use App\Lib\WorkCompanyLib;

class WorkCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (request()->has('state')){
            $featuredimage_work = FeaturedImage::where('page_name','work')->get();
            $workCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->where('state', request('state'))->paginate(0)->appends('state', request('state'));
            
            $work_addresses = WorkCompany::where('state', request('state'))->pluck('housing_address');
            $work_name = WorkCompany::where('state', request('state'))->pluck('company_name');
            $work_desc = WorkCompany::where('state', request('state'))->pluck('description');
            $work_filter = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
            $work_id = WorkCompany::where('state', request('state'))->pluck('id');
            $work_image = WorkCompany::pluck('image');
         

            return view('users.work.work', compact('work_image', 'featuredimage_work', 'workCompany_table', 'work_filter','work_addresses','work_name','work_desc','work_id'));
        }
        else{
            $featuredimage_work = FeaturedImage::where('page_name','work')->get();
            $workCompany_table = WorkCompany::with('work_opportunity', 'work_qualifications','work_industry', 'work_duration')->get();
        

            $work_addresses = WorkCompany::orderBy('ID','ASC')->pluck('housing_address');
            $work_name = WorkCompany::pluck('company_name');
            $work_desc = WorkCompany::pluck('description');
            $work_id = WorkCompany::pluck('id');
            $work_image = WorkCompany::pluck('image');

            return view('users.work.work', compact('featuredimage_work', 'work_image', 'work_id', 'featuredimage_work', 'workCompany_table','work_addresses','work_name','work_desc'));
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
        'action' => $action
    ]);
    }

    public function adminEdit($id){
        $company = WorkCompanyLib::getById($id);
        $error = false;

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
        $company = WorkCompanyLib::getById($id);

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


    
}
