<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventPlugin;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use App\CategoryList;
use App\EventCategory;
use Carbon\Carbon;

class EventPluginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $curl = curl_init();
        $rss_url = "https://graph.facebook.com/v2.11/visionphil/events?since=2017-12-30&fields=name,cover,description,end_time,start_time,place,timezone,limit=999&access_token=1903307039702096|nNl9j-XnQOaFXXcp2Z9GRrE8qQ8";
        curl_setopt($curl, CURLOPT_URL, $rss_url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)');
        curl_setopt($curl, CURLOPT_REFERER, '');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $data = curl_exec($curl); // execute the curl command
        curl_close($curl);

        $insertResult = json_decode($data, true);
/* 
        $loop = count($insertResult['data']);

        $forDelete = DB::table('fbevents')
                    ->select('post_id')
                    ->get();

        for ($i=0; $i >= $loop; $i++){
            $variable[] = $insertResult['data'][$i];

            var_dump($variable);
            
            
        }

         */

        

        if (isset($insertResult)){
            foreach ($insertResult['data'] as $result) {
                // convert time to datetime instance
                $starttimestamp = strtotime($result['start_time']);

                $datetime = new DateTime;
                $datetime->setTimestamp($starttimestamp);
                $datetime->setTimezone(new DateTimeZone('US/Eastern'));
                $datetime->format('g:i a');
                $datetime->format('l, F j, Y');
                
                if(isset($result['end_time'])){
                    $endtimestamp = strtotime($result['end_time']);
                    $endtime = new DateTime;
                    $endtime->setTimestamp($endtimestamp);
                    $endtime->setTimezone(new DateTimeZone('US/Eastern'));
                    $endtime->format('g:i a');
                    $endtime->format('l, F j, Y'); 

                    if (isset($result['place']['name'])){

                        $dataset = array(
                            'event_name' => $result['name'],
                            'event_description' => $result['description'],
                            'cover_source' => $result['cover']['source'],
                            'start_time' => $datetime,
                            'end_time' => $endtime,
                            'place_name' => $result['place']['name'],
                            'place_id' => $result['place']['id'],
                            'location_city' => $result['place']['location']['city'],
                            'location_country' => $result['place']['location']['country'],
                            'location_street' => $result['place']['location']['street'],
                            'timezone' => $result['timezone'],
                            'post_id' => $result['id'],
                    );

                    }
                    else{
                        $dataset = array(
                            'event_name' => $result['name'],
                            'event_description' => $result['description'],
                            'cover_source' => $result['cover']['source'],
                            'start_time' => $datetime,
                            'end_time' => $endtime,
                            'timezone' => $result['timezone'],
                            'post_id' => $result['id'],
                         );
                    }

                    
                    
                }

                else{


                    if (isset($result['place']['name'])){
                    $dataset = array(
                        'event_name' => $result['name'],
                        'event_description' => $result['description'],
                        'cover_source' => $result['cover']['source'],
                        'start_time' => $datetime,
                        'place_name' => $result['place']['name'],
                        'place_id' => $result['place']['id'],
                        'location_city' => $result['place']['location']['city'],
                        'location_country' => $result['place']['location']['country'],
                        'location_street' => $result['place']['location']['street'],
                        'timezone' => $result['timezone'],
                        'post_id' => $result['id'],
                        );
                    }
                    else{
                        $dataset = array(
                            'event_name' => $result['name'],
                            'event_description' => $result['description'],
                            'cover_source' => $result['cover']['source'],
                            'start_time' => $datetime,
                            'timezone' => $result['timezone'],
                            'post_id' => $result['id'],
                            );
                    }

                
                    
                }
                
                
                
                

                
                $get_postid = $result['id'];    


             $event = EventPlugin::UpdateorCreate(['post_id' => $result['id']], $dataset);
                
                
        
        
        
            }

                if (request()->has('event_id')){
                    $s = $request->input('s');

                    

                    $category_event = EventCategory::where('category_id', request('event_id'))->pluck('event_id');


                    $events_table = EventPlugin::with('eventcategory')
                            ->orderBy('created_at', 'desc')
                            ->search($s)
                            ->whereIn('fbevent_id', $category_event)
                            ->paginate(2);
            

         }
         else{
            $s = $request->input('s');
            
            $events_table = EventPlugin::with('eventcategory')
                            ->orderBy('created_at', 'desc')
                            ->search($s)
                            ->paginate(6);


         } 

        $category_table = CategoryList::withCount('eventcategorytable')->get();
        return view('users.facebook', compact('s', 'event_table', 'category_table','events_table'))->with('data', json_decode($data, true));  
        }

        //END OF IF INSERT RESULT
        else{

         if (request()->has('event_id')){
            $s = $request->input('s');

            

            $category_event = EventCategory::where('category_id', request('event_id'))->pluck('event_id');


            $events_table = EventPlugin::with('eventcategory')
                    ->orderBy('created_at', 'desc')
                    ->search($s)
                    ->whereIn('fbevent_id', $category_event)
                    ->paginate(6);
            

         }
         else{
            $s = $request->input('s');
            
            $events_table = EventPlugin::with('eventcategory')
                            ->orderBy('created_at', 'desc')
                            ->search($s)
                            ->paginate(6);


         } 

         $category_table = CategoryList::withCount('eventcategorytable')->get();
        return view('users.facebook', compact('s', 'events_table' , 'category_table'))->with('data', json_decode($data, true));  
        }
     
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventPlugin::find($id);
        return view('admin.event.edit', compact('event'));
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
        $event = EventPlugin::findorFail($id);

        $event->event_name = $request['event_name'];
        $event->event_description = $request['event_description'];
        $event->cover_source = $request['cover_source'];
        $event->start_time = $request['start_time'];
        $event->end_time = $request['end_time'];
        $event->place_name = $request['place_name'];
        $event->location_city = $request['location_city'];
        $event->location_country = $request['location_country'];
        $event->location_street = $request['location_street'];
        $event->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('event.list')->with($success);
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
        $event = EventPlugin::all();
        return view('admin.event.list', compact('event'));
    }

    public function adminView($id)
    {
        
        $event = EventPlugin::with('eventcategory')->find($id);

        $event_category = DB::table('category_event')
            ->where('event_id', $id)
            ->pluck('category_id');


        $category_list = DB::table('category_list')
            ->wherenotIn('id', $event_category)
            ->get();

        return view('admin.event.view', compact('event','event_category','category_list'));

    }

    public function adminUpdate($id, Request $request)
    {

        $event = EventPlugin::findorFail($id);

        if ($request->has('event_bulk'))
        {
        $event_list = $request->input('event_bulk');
        foreach($event_list as $caca)
        {

        DB::table('category_event')->insert([
            ['event_id' => $id, 'category_id' => $caca, 'updated_at' => Carbon::now()]
        ]);
        }
        }


        $success = array('ok'=> 'Success');
        
        return redirect()->route('event.list')->with($success);

    }


    public function eventSingle($fbevent_id)
    {
         $previous_events = $fbevent_id - 1;
         $next_events = $fbevent_id + 1;
         $events = EventPlugin::find($fbevent_id);
         $nextevents = EventPlugin::find($next_events);
         $previousevents = EventPlugin::find($previous_events);

         $event_table = EventPlugin::with('eventcategory')->orderBy('created_at', 'desc')->get();

         $category_table = CategoryList::withCount('eventcategorytable')->get();


         $category_events_general = EventPlugin::where('category', 'General')->count();
         $category_events_design = EventPlugin::where('category', 'Design')->count();
         $category_events_events = EventPlugin::where('category', 'Events')->count();
         $category_events_food = EventPlugin::where('category', 'Food')->count();
         $category_events_jobfair = EventPlugin::where('category', 'Job Fair')->count();
         if (request()->has('ecat')){
            $events_table = EventPlugin::where('category',request('ecat'))->get();
         }
         else{
            $events_table = EventPlugin::all();
         } 
        return view('users.events.single_event', compact('event_table', 'category_table', 'previousevents','nextevents','events','category_events_general','category_events_design','category_events_events','category_events_food','category_events_jobfair','events_table'));
    }

    public function deleteEventCategory($id)
    {

        
        $eventcategory = EventCategory::find($id)->delete();
        
            return response()->json([
        'success' => 'Record has been deleted successfully!'
    ]);

    }



}