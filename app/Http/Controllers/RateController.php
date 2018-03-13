<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\Country;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rate_table = Rate::all();
        return view('admin.rates.list', compact('rate_table'));
    }

    public function adminIndex()
    {
        $rate_table = Rate::paginate(10);
        return view('admin.rates.list', compact('rate_table'));
    }

    public function adminEdit($id)
    {
        $rate = Rate::findorFail($id);
        $country = Country::all();
        $action = route('rate.adminUpdate', $id);
        $method = "post";

        return view('admin.rates.form', compact('country', 'rate', 'action', 'method'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $rate = Rate::findorFail($id);

        $rate->program = $request['program'];
        $rate->reservation = $request['reservation'];
        $rate->first = $request['first'];
        $rate->second = $request['second'];
        $rate->third = $request['third'];

        $getCountry = $request->input('country');
        
        $f = $request->get('first');
        $s = $request->get('second');
        $t = $request->get('third');

        if($getCountry == "Australia"){
            $rate->visa = $request['visa'];
            $v = $request->get('visa');
            $total = $f + $s + $t +$v;
        }
        else{
            $total = $f + $s + $t;
        }

        


        $rate->total = $total;
        $rate->duration = $request['duration'];

        $rate->save();

        $success = array('ok'=> 'Success');
        
        return redirect()->route('rate.adminIndex')->with($success);

    }


}
