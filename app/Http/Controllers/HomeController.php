<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeaturedImage;
use App\InternshipCompany;
use App\Opportunity;
use App\Qualification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\InternshipDuration;
use App\Application;
use App\EventPlugin;
use App\Models\Testimonials;
use App\Models\Programs;
use App\Blog;
use App\News;
use App\Counter;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  
        $featuredimage_home = FeaturedImage::where('page_name','home')->get();


        //use $promo on foreach
        $get_promo = DB::table('featuredimage')
            ->where('page_name', 'home')
            ->first()
            ->promo_id;
        
        $promo = Programs::where('id', $get_promo)->get();

        //use $testimonial on foreach
        $get_testimonial = DB::table('featuredimage')
            ->where('page_name', 'home')
            ->first()
            ->testimonial_id;

        $testimonial = Testimonials::where('id', $get_testimonial)->get();



        $testimonials = Testimonials::all();
        $programs = Programs::all();
        
        $events_table = EventPlugin::orderBy('fbevent_id', 'desc')->take(4)->get();
        $internshipcompany_table = InternshipCompany::where('featured','Yes')->get();
        return view('welcome', compact('testimonial' , 'promo', 'featuredimage_home','events_table','internshipcompany_table', 'programs', 'testimonials'));
    }

    public function adminIndex()
    {
        $app = Application::count('id');
        $blog = Blog::count('id');
        $news = News::count('id');
        $programs = Programs::count('id');
        $testimonials = Testimonials::count('id');
        return view('admin.home', compact('app', 'blog', 'news', 'programs', 'testimonials'));
    }

    public function adminCounterEdit(Request $request , $id = 1){
        $counter = Counter::find($id);
        $action = route('counter.adminUpdate', 1);
        $method = "post";

        return view('admin.featured_image.counter', compact('counter','action', 'method'));
    }
    
    public function adminCounterUpdate(Request $request, $id = 1)
    {
        $counter = Counter::find($id);

        $counter->country = $request['country'];
        $counter->state = $request['state'];
        $counter->company = $request['company'];
        $counter->applicant = $request['applicant'];
        $counter->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->back()->with($success);

    }
}
