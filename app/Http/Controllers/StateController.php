<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $countries=Country::All();
        $states=State::All();
        return view('state.index', compact('states','countries'));
    }

    public function store(Request $request)
    {
        State::create([
            'name'=> $request['name'],
            'country_id'=>$request['country_id']

        ]);
        return redirect()->route('states.index')->with('message','Country Added Succesfully');
    }

    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message','State Deleted Succesfully');
    }
}
