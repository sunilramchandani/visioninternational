<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Location;
use App\Country;
use App\City;
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

use App\Models\Testimonials;
use App\Models\Programs;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //use $testimonial on foreach
        $get_testimonial = DB::table('featuredimage')
            ->where('page_name', 'application')
            ->first()
            ->testimonial_id;

        $testimonial = Testimonials::where('id', $get_testimonial)->get();



        $featuredimage_application = FeaturedImage::where('page_name','application')->get();
        $application_table = Application::all();
        $location_table = Location::all();
        $country_table = Country::all();
        $program_table    = Program::all();
        $university_table = University::pluck('university_name');
        $city_table = City::orderBy('city_name', 'asc')->get();
        $degree_table = Degree::pluck('degree_name');
        $major_table = Major::all();
        $internship_addresses = InternshipCompany::pluck('company_name');
        $work_addresses = WorkCompany::pluck('company_name');
        return view('users.application_form.application_form', compact('testimonial', 'featuredimage_application', 'major_table', 'degree_table', 'university_table', 'program_table', 'application_table', 'location_table', 'country_table','internship_addresses','work_addresses','city_table'));
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

            'email'   => 'email',
            'upload_resume' => 'mimes:pdf'
            ]);


        $application = new Application;
        $application->program_name = $request['program_name'];
        $application->country_name = $request['country_name'];
        $application->location_name = $request['location_name'];
        $application->last_name = $request['last_name'];
        $application->first_name = $request['first_name'];
        $application->email = $request['email'];
        $application->contact_no = $request['contact_no'];
        $application->birthdate = $request['birthdate'];
        $application->gender = $request['gender'];
        $application->current_city = $request['current_city'];
        $application->university_name = $request['university_name'];
        $application->degree_name = $request['degree_name'];
        $application->major_name = $request['major_name'];
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
            'program_name' => $request->program_name,
            'country_name'   => $request->country_name,
            'location_name'   => $request->location_name,
            'last_name'   => $request->last_name,
            'first_name'   => $request->first_name,
            'email'   => $request->email,
            'contact_no'   => $request->contact_no,
            'birthdate'   => $request->birthdate,
            'gender'   => $request->gender,
            'current_city'   => $request->current_city,
            'university_name'   => $request->university_name,
            'degree_name'   => $request->degree_name,
            'major_name'   => $request->major_name,
            'grad_date'   => $request->grad_date,
            'start_date'   => $request->start_date,
        );


        $success = array('ok'=> 'Thank you! Your application has been successfully sent. We will contact you very soon!');
        
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

      public function viewTrash(){
        $app = Application::onlyTrashed()->get();
        return view('admin.application.trash', compact('app'));
    }


    public function restoreTrash($id){
        $app = Application::withTrashed()
        ->where('id', $id)
        ->restore();
        $success = array('ok'=> 'Successfully Restored');
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
