<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::All();
        return view('department.index',['departments'=>$departments]);
    }

    public function store(Request $request)
    {
        Department::create([
            'name'=>$request['name'],
        ]);
        return  redirect()->route('departments.index')->with('message','Department Added Succesfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return  redirect()->route('departments.index')->with('message','Department Added Succesfully');
    }
}
