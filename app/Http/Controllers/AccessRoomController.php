<?php

namespace App\Http\Controllers;

use App\Employee;
use App\AccessRoom;
use Illuminate\Http\Request;

class AccessRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employee = Employee::where('employee_id', $request->employee_id)->first();
        

        $access = new AccessRoom;
        $access->employee_id = $employee->employee_id;
        $access->have_access = 1;
        $access->access_granted = 1;
        $access->save();
        return view('room_911.index', compact('employee'));
           
            
            
        
        
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccessRoom  $accessRoom
     * @return \Illuminate\Http\Response
     */
    public function show($emp)
    {
        $employee = Employee::where('employee_id', $emp->employee_id)->first();
        return view('room_911.index', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccessRoom  $accessRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessRoom $accessRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccessRoom  $accessRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessRoom $accessRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccessRoom  $accessRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessRoom $accessRoom)
    {
        //
    }
}
