<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\http\Requests\EmployeeStoreRequest;
use App\http\Resources\EmployeeResource;
use App\http\Resources\EmployeeSingleResource;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::all();

        if ($request->search) {
            $employees = Employee::where('first_name', "like", "%{$request->search}%")
            ->orWhere('last_name', "like", "%{$request->search}%")
            ->get();
        } elseif ($request->department_id) {
            $employees = Employee::where('department_id', $request->department_id)->get();
        }
       

        return EmployeeResource::collection($employees); 
    }

    public function store(EmployeeStoreRequest $request)
    {
        $employee = Employee::create($request->validated());

        return response()->json($employee);
    }


    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
    }
    public function show(Employee $employee)
    {
        return new EmployeeSingleResource($employee);
    }
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json('Employee Deleted Successfully');
    }
}
