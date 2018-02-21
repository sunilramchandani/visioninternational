<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Location;
use App\Country;
use App\Program;
use App\University;
use App\Degree;
use App\Major;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Lib\ApplicationLib;
use Storage;
use PDF;
use Carbon\Carbon;
use App\FeaturedImage;
use App\InternshipCompany;
use App\WorkCompany;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredimage_application = FeaturedImage::where('page_name','application')->get();
        $application_table = Application::all();
        $location_table = Location::all();
        $country_table = Country::all();
        $program_table    = Program::all();
        $university_table = University::all();
        $degree_table = Degree::all();
        $major_table = Major::all();
        $internship_addresses = InternshipCompany::pluck('company_name');
        $work_addresses = WorkCompany::pluck('company_name');
        return view('users.application_form.application_form', compact('featuredimage_application', 'major_table', 'degree_table', 'university_table', 'program_table', 'application_table', 'location_table', 'country_table','internship_addresses','work_addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $application_table = Application::all();
        $location = Location::pluck('location_name', 'location_id');
        $country = Country::pluck('country_name', 'country_id' );
        $program = Program::pluck('title', 'program_id' );

        $university = University::pluck('university_name', 'university_id');
        $degree = Degree::pluck('degree_name', 'degree_id' );
        $major = Major::pluck('major_name', 'major_id' );

        return view('users.application_form.application_form', compact('major', 'degree', 'university', 'program', 'application_table', 'location', 'country'));
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

            'email'   => 'required|email',

            
            /*
            'program_id' => 'required',
            'country_id'   => 'required',
            'location_id'   => 'required',
            'last_name'   => 'required',
            'first_name'   => 'required',
            'contact_no'   => 'required',
            'birthdate'   => 'required',
            'gender'   => 'required',

            'current_city'   => 'required',
            'university_id'   => 'required',
            'degree_id'   => 'required',

            'major_id'   => 'required',
            'grad_date'   => 'required',
            'start_date'   => 'required',

            'about_vip'   => 'required',
            'message'   => 'required',
            */

            ]);


        $application = new Application;
        $application->program_id = $request['program_id'];
        $application->country_id = $request['country_id'];
        $application->location_id = $request['location_id'];
        $application->last_name = $request['last_name'];
        $application->first_name = $request['first_name'];
        $application->email = $request['email'];
        $application->contact_no = $request['contact_no'];
        $application->birthdate = $request['birthdate'];
        $application->gender = $request['gender'];
        $application->current_city = $request['current_city'];
        $application->university_id = $request['university_id'];
        $application->degree_id = $request['degree_id'];
        $application->major_id = $request['major_id'];
        $application->grad_date = $request['grad_date'];
        $application->start_date = $request['start_date'];
        $application->about_vip = $request['about_vip'];
        $application->message = $request['message'];
        
        if ($request->hasFile('upload_resume')){
        $file = $request->file('upload_resume');
        $name = $file->getClientOriginalName();
        $fileName = Carbon::now()->toDateString().'.'.rand(1,99999999).'_'.$name;
        $file->move('../storage/app/upload_resume', $fileName);

        $application->upload_resume = $fileName;
        }
        $application->save();

        



        $data = array(
            'program_id' => $request->program_id,
            'country_id'   => $request->country_id,
            'location_id'   => $request->location_id,
            'last_name'   => $request->last_name,
            'first_name'   => $request->first_name,
            'email'   => $request->email,
            'contact_no'   => $request->contact_no,
            'birthdate'   => $request->birthdate,
            'gender'   => $request->gender,
            'current_city'   => $request->current_city,
            'university_id'   => $request->university_id,
            'degree_id'   => $request->degree_id,
            'major_id'   => $request->major_id,
            'grad_date'   => $request->grad_date,
            'start_date'   => $request->start_date,
        );

        Mail::send('users.application_form.application_received', $data, function ($mail) use($data) {
            $mail->from($data['email']);
            $mail->to('careers@visioninternational.skyrocketph.technology')->subject("Application");
        });

        Mail::send('users.application_form.application_sent', $data, function ($mail) use($data) {
            $mail->from('careers@visioninternational.skyrocketph.technology');
            $mail->to($data['email'])->subject($data['first_name']);
        });


        $success = array('ok'=> 'Success');
        
        return redirect()->route('application.index')->with($success);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = ApplicationLib::getById($id);

        $get_resume = DB::table('Application')
        ->where('id', $id)
        ->first()
        ->upload_resume;

        $path = storage_path('app/upload_resume/'.$get_resume);
        
        return response()->download($path);
    }

    public function downloadPDF($id){
        $application_table = Application::all();
        $pdf = ApplicationLib::getById($id);

        $pdf = PDF::loadView('admin.application.pdf', compact('pdf', 'application_table'));
        
        return $pdf->download('invoice.pdf');

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

    public function upload()
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

        $pagination = ApplicationLib::getPaginated($params);
        $app = $pagination->items();


        return view('admin.application.list', [
            'app' => $app,
            'paginator' => $pagination
        ]);
    }



    public function delete($id)
    {
        $app = ApplicationLib::getById($id);

        $data = [
            'type' => 'success',
            'message' => 'Successfully Deleted'
        ];

        $result = $app->delete();
        if(!$result) {
            $data['type'] = 'danger';
            $data['message'] = 'Invalid Application';
        }

        return redirect()->route('application.list')->with('flash', $data);
    }

    public function view($id)
    {
        $app = ApplicationLib::getById($id);

        if(!$app) {
           return redirect()->route('application.list')->with('flash', [
               'type' => 'danger',
               'message' => 'Invalid News'
           ]);
        }

        return view('admin.application.view', [ 'app' => $app]);
    }

}
