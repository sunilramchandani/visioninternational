<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventPlugin;
use Illuminate\Support\Facades\DB;
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
        $rss_url = "https://graph.facebook.com/v2.11/2092525184364641/events?fields=name,cover,description,end_time,start_time,place,timezone&access_token=EAAbDDDPZCZCFABACmIOHj1Hk81WZCpeleMY0gEkHgVgDF8C2vKMbf9ZBt2KNdhU9fZACWD9bBlt8Ny3Xa4dcmZAhRGZAiNxDjRmMTgsp2gqNH5BqXVT4NoNTb9kHOUOmOM9hmIfKcDJ42ddxm9DuLb7fZCHfUCYFef3vDG8iHfqsMQZDZD";
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
        $dataset = array(
            'name' => $result['name'],
            'description' => $result['description'],
        );
    }
        $event = EventPlugin::firstOrCreate($dataset);
    
        return view('users.facebook')->with('data', json_decode($data, true));  
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
}
