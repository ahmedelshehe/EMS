<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $cities=City::All();
        $countries=Country::All();
        $states=State::All();
        return view('city.index', compact('states','countries','cities'));
    }

    public function store(Request $request)
    {
        City::create([
            'name'=> $request['name'],
            'state_id'=>$request['state_id']

        ]);
        return redirect()->route('cities.index')->with('message','City Added Succesfully');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message','City Deleted Succesfully');
    }
}
