<?php

namespace App\Http\Controllers;

use App\Requirement;
use Illuminate\Http\Request;
use App\Product;
use App\Employee;

class RequirementController extends Controller
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

        $req = Requirement::all();
        $employee = Employee::select('id','name')->get();
        $product = Product::select('id','name')->get();

        $result['employee_list'] = $employee ;
        $result['product_list'] = $product ;
        $result['req_list'] = $req;

        return view ('requirement',$result);
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
        $req = new Requirement();

        $req->employee_id = $request->get('employee_select');
        $req->product_id = $request->get('product_select');
        $req->amount = $request->get('count');

        $req->save();

        return back()->with('status', 'Successfully added Requirements!')->with('type', 'success');
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
    public function update(Request $request, $id)
    {
        //
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
