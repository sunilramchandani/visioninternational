<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventPlugin;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class EventPluginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curl = curl_init();
        $rss_url = "https://graph.facebook.com/v2.11/visionphil/events?since=2017-10-12&until=2018-02-01&fields=name,cover,description,end_time,start_time,place,timezone,limit=999&access_token=EAAbDDDPZCZCFABACmIOHj1Hk81WZCpeleMY0gEkHgVgDF8C2vKMbf9ZBt2KNdhU9fZACWD9bBlt8Ny3Xa4dcmZAhRGZAiNxDjRmMTgsp2gqNH5BqXVT4NoNTb9kHOUOmOM9hmIfKcDJ42ddxm9DuLb7fZCHfUCYFef3vDG8iHfqsMQZDZD";
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
       
        foreach ($insertResult['data'] as $result) {
                // convert time to datetime instance
                $starttimestamp = strtotime($result['start_time']);
                $endtimestamp = strtotime($result['end_time']);
        
                $endtime = new DateTime;
                $endtime->setTimestamp($endtimestamp);
                $endtime->setTimezone(new DateTimeZone('US/Eastern'));
                $endtime->format('g:i a');
                $endtime->format('l, F j, Y'); 
                
                $datetime = new DateTime;
                $datetime->setTimestamp($starttimestamp);
                $datetime->setTimezone(new DateTimeZone('US/Eastern'));
                $datetime->format('g:i a');
                $datetime->format('l, F j, Y');

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
                        'location_latitude' => $result['place']['location']['latitude'],
                        'location_longtitude' => $result['place']['location']['longitude'],
                        'location_street' => $result['place']['location']['street'],
                        'location_zip' => $result['place']['location']['zip'],
                        'timezone' => $result['timezone'],
                        'post_id' => $result['id'],
                );

                    $event = EventPlugin::firstorCreate($dataset);
                
                
        
        
        
    }
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
        return view('users.facebook', compact('category_events_general','category_events_design','category_events_events','category_events_food','category_events_jobfair','events_table'))->with('data', json_decode($data, true));  
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

    public function eventSingle($fbevent_id)
    {
        $events = EventPlugin::find($fbevent_id);
        return view('users.events.single_event', compact('events'));
    }
}
