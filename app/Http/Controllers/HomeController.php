<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Department;
use Datatables;
use Illuminate\Http\Request;
use App\DataTables\EmployeesDataTable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(EmployeesDataTable $dataTable)
    {
        $employees = Employee::all();
        $departments = Department::pluck('name', 'id');
        
        $emp = new Employee;
        
        return view('employees.index', compact('employees', 'departments', 'emp'));

        // return $dataTable->render('employees.index');
        
    }
}
