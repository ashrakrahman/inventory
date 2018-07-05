<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('token')){
            return redirect()->route('login');
        }
        $result = null ;

        $employee = Employee::all();

        $result['employee_list'] = $employee ;

        return view ('employee',$result);
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
        $employee = new Employee();

        $employee->name = $request->get('name');
        $employee->batch_id = $request->get('b_id');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('phone');

        $employee->save();

        return back()->with('status', 'Successfully added Employee!')->with('type', 'success');
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
    public function update(Request $request)
    {
        $employee = Employee::find($request->get('e_id'));

        if(!$employee) {
            return response(404);
        }

        if($request->has('edit_name')) $employee->name = $request->get('edit_name');
        if($request->has('edit_b_id')) $employee->batch_id = $request->get('edit_b_id');
        if($request->has('edit_email')) $employee->email = $request->get('edit_email');
        if($request->has('edit_phone')) $employee->phone = $request->get('edit_phone');
        $employee->save();

        return back()->with('status', 'Successfully updated Employee!')->with('type', 'success');

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
