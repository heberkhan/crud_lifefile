<?php

namespace App\Http\Controllers;

use App\Employee;
use App\AccessRoom;
use App\Department;
use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use Yajra\Datatables\Datatables;
use App\Http\Requests\StoreEmployee;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return Datatables::of($employees)->make(true);
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
        $employee = Employee::create($request->all());
        return back()->with(['message'=> 'Employee Created Successfully','alert'=>'success']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $emp)
    {
        $departments = Department::pluck('name', 'id');
        return view('employees.edit', compact('emp', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return back()->with(['message'=> 'Employee Edited Successfully','alert'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        $emp= Employee::find($employee)->delete();
        return back()->with(['message'=> 'Employee Deleted Successfully','alert'=>'danger']);
    }

    public function access_911 (Employee $employee)
    {
        if ($employee->access == 0) {
            $employee->access = 1;
            $employee->save();
            return back()->with(['message'=> 'Access granted to Room 911','alert'=>'info']);
        }
        $employee->access = 0;
        $employee->save();
        return back()->with(['message'=> 'Access denied to Room 911','alert'=>'danger']);
    }

    public function import(Request $request)
    {
        
        Excel::import(new EmployeesImport, $request->file);
        return back()->with(['message'=> 'File charged successfully','alert'=>'success']);
    }

    public function history($employee)
    {
        $access = AccessRoom::where('employee_id', $employee)->paginate(10);
        $employee = Employee::where('employee_id', $employee)->first();
        return view('employees.history', compact('access', 'employee'));
    }

    public function history_results(Request $request)
    {
        dd($request);
        $employee = Employee::where('employee_id', $request->employee_id)->first();
        $access = AccessRoom::where('created_at', '>=', $request->initial_date,)
                            ->where('created_at','<=', $request->final_date)
                            ->paginate(10);
        return view('employees.history', compact('access', 'employee'));
    }
}
