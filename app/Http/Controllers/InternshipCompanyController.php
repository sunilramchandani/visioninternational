<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InternshipCompany;
use App\Opportunity;
use App\Qualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\InternshipDuration;
use App\FeaturedImage;

use App\Lib\CompanyLib;

class InternshipCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('state')){
            $featuredimage_internship = FeaturedImage::where('page_name','internship')->get();
            $internshipCompany_table = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->where('id', request('id'))->paginate(0)->appends('id', request('id'))->orderBy('ID','ASC');
        
            $internship_addresses = InternshipCompany::where('state', request('state'))->orderBy('ID','ASC')->pluck('housing_address');
            $internship_name = InternshipCompany::where('state', request('state'))->pluck('company_name');
            $internship_desc = InternshipCompany::where('state', request('state'))->pluck('description');
            $internship_filter = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->get();
            $internship_id = InternshipCompany::where('state', request('state'))->pluck('id');
            
            return view('users.internship.internship', compact('featuredimage_internship', 'internshipCompany_table', 'internship_filter','internship_addresses','internship_name','internship_desc','internship_id'));
        }
        else{
            $featuredimage_internship = FeaturedImage::where('page_name','internship')->get();
            $internshipCompany_table = InternshipCompany::with('opportunity', 'qualifications','internship_industry', 'internship_duration')->orderBy('ID','ASC')->get();
        
            $internship_addresses = InternshipCompany::orderBy('ID','ASC')->pluck('housing_address');
            $internship_name = InternshipCompany::pluck('company_name');
            $internship_desc = InternshipCompany::pluck('description');
            $internship_id = InternshipCompany::pluck('id');
            $internship_image = InternshipCompany::pluck('image');
            return view('users.internship.internship', compact('featuredimage_internship', 'internshipCompany_table','internship_addresses','internship_name','internship_desc','internship_id','internship_image'));
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
    $action = route('internshipcompany.save');

    if(request()->isMethod('post')) {
        $data = request()->all();

        $result = CompanyLib::create($data);

        if ($result) {
            return redirect()
                ->route('internshipcompany.list')
                ->with('flash', [
                    'type' => 'success',
                    'message' => 'Successfully Added'
                ]);
        }
    }

    return view('admin.internship_company.form', [
        'error' => $error,
        'action' => $action
    ]);
    }

    public function adminEdit($id){
        $company = CompanyLib::getById($id);
        $error = false;

        if (!$company) {
            return redirect()->route('internshipcompany.list')->with('flash', [
                'type' => 'danger',
                'message' => 'Invalid Company'
            ]);
        }

        if (request()->isMethod('post')) {
            $data = request()->all();

            $result = CompanyLib::update($id, $data);

            if (!$result) {
                $error = [
                    'type' => 'danger',
                    'message' => 'Something went wrong while updating program'
                ];
            } else {
                return redirect()->route('internshipcompany.list')->with('flash', [
                    'type' => 'success',
                    'message' => 'Company was successfully updated'
                ]);
            }
        }

        $action = route('internshipcompany.saveadminedit', $id);

        return view('admin.internship_company.form', [
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

        $pagination = CompanyLib::getPaginated($params);
        $company = $pagination->items();


        return view('admin.internship_company.list', [
            'company' => $company,
            'paginator' => $pagination
        ]);
    }



    public function delete($id)
    {
        $company = CompanyLib::getById($id);

        $data = [
            'type' => 'success',
            'message' => 'Successfully Deleted'
        ];

        $result = $company->delete();
        if(!$result) {
            $data['type'] = 'danger';
            $data['message'] = 'Invalid Company';
        }

        return redirect()->route('internshipcompany.list')->with('flash', $data);
    }

    public function view($id)
    {
        $company = CompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('internshipcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Company'
           ]);
        }

        return view('admin.internship_company.view', [ 'company' => $company]);
    }

    public function createOpportunity($id)
    {
        $company = CompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('internshipcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Company'
           ]);
        }

        return view('admin.internship_company.opportunity', [ 'company' => $company]);
    }

    public function storeOpportunity($id, Request $request)
    {
        $company = CompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('internshipcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Company'
           ]);
        }

        $opportunity = new Opportunity();
        $opportunity->company_id = $id;
        $opportunity->opportunity_name = $request['opportunity_name'];
        $opportunity->status = "Inactive";
        $opportunity->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('internship_company.view')->with($success);
    }

    public function createQualification($id)
    {
        $company = CompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('internshipcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Qualification'
           ]);
        }

        return view('admin.internship_company.qualification', [ 'company' => $company]);
    }

    public function storeQualification($id, Request $request)
    {
        $company = CompanyLib::getById($id);

        if(!$company) {
           return redirect()->route('internshipcompany.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid Qualification'
           ]);
        }

        $qualification = new Qualification();
        $qualification->company_id = $id;
        $qualification->qualification = $request['qualification'];
        $qualification->status = "Inactive";
        $qualification->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('internshipcompany.list')->with($success);
    }

    public function durationIndex()
    {
        $duration_table = InternshipDuration::all();
        return view('admin.internship_company.duration.list', compact('duration_table'));
    }

    public function createDuration($id)
    {
        $duration = InternshipDuration::find($id);
        return view('admin.internship_company.duration.form', compact('duration'));
    }

    public function storeDuration($id, Request $request)
    {

        $duration = InternshipDuration::find($id);
        $duration->duration_months	 = $request['duration_months'];
        $duration->duration_price = $request['duration_price'];
        $duration->duration_start_date = $request['duration_start_date'];
        $duration->save();

        $success = array('ok'=> 'Success');
        return redirect()->route('internshipcompany.durationList')->with($success);
    }


    
}
