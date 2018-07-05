<?php

namespace App\Http\Controllers;

use App\ProductHolder;
use Illuminate\Http\Request;
use App\Product;
use App\Employee;
use Illuminate\Support\Facades\Redirect;

class ProductHolderController extends Controller
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

        $ph = ProductHolder::all();
        $employee = Employee::select('id','name')->get();
        $product = Product::select('id','name')->get();

        $result['employee_list'] = $employee ;
        $result['product_list'] = $product ;
        $result['holder_list'] = $ph ;

        return view('productholder',$result);
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
        $pro = new ProductHolder();

        $pro->employee_id = $request->get('employee_select');
        $pro->product_id = $request->get('product_select');
        $pro->employee_issue_date = $request->get('issue');
        $pro->qr_code_status = 0;

        $pro->save();

        return back()->with('status', 'Successfully added Product Holder Info!')->with('type', 'success');
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
    public function update(Request $request,$id)
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

    /**
     * Get a product holder detail
     * @param $id
     */
    public function getDetails($id)
    {
        $result = null ;
        $ph = ProductHolder::select('*')->where('id',$id)->first();
        $employee = Employee::select('*')->where('id',$ph->employee_id)->first();
        $product = Product::select('*')->where('id',$ph->product_id)->first();

        $result['employee'] = $employee ;
        $result['product'] = $product ;
        $result['holder'] = $ph ;

        return view ('productholderdetail',$result);
    }

    /**
     * set a  qr code for a product holder
     */
    public function generateQrCOde($id)
    {
        $ph = ProductHolder::select('*')->where('id',$id)->first();
        $employee = Employee::select('name')->where('id',$ph->employee_id)->first();
        $product= Product::select('name')->where('id',$ph->product_id)->first();

        $holder = ProductHolder::find($id);
        $rand = str_random(10);
        $qrcode = $employee['name'].'-'.$product['name'].'-'.$rand;

        $holder->qr_code = $qrcode;
        $holder->qr_code_status = 1;
        $holder->save();

        return back()->with('status', 'Successfully QR code Generated!')->with('type', 'success');
    }
}
