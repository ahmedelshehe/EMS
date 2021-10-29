<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if($request->has('search')){
            $countries = Country::where('name', 'like', "%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}%")->get();
            return view('country.index',['countries'=>$countries]);
        }else{
        $countries=Country::All();
        return view('country.index',['countries'=>$countries]);
        }
    }

    public function store(Request $request)
    {
        Country::create([
            'name'=> $request['name'],
            'country_code'=>$request['country_code']

        ]);
        return redirect()->route('countries.index')->with('message','Country Added Succesfully');
    }

    
  
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('message','Country Added Succesfully');

    }

}
