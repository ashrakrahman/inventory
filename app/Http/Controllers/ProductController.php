<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
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

        $product = Product::all();
        $result['product_list'] = $product ;

        return view ('product',$result);
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
        $product = new Product();

        $product->name = $request->get('name');
        $product->category = $request->get('cat');
        $product->details = $request->get('details');
        $product->price = $request->get('price');

        $product->save();

        return back()->with('status', 'Successfully added Product!')->with('type', 'success');
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
        $e = Product::find($request->p_id);

        if(!$e) {
            return response(404);
        }

        if($request->has('edit_name')) $e->name = $request->get('edit_name');
        if($request->has('edit_cat')) $e->category = $request->get('edit_cat');
        if($request->has('edit_details')) $e->details = $request->get('edit_details');
        if($request->has('edit_price')) $e->price = $request->get('edit_price');
        $e->save();

        return back()->with('status', 'Successfully updated Product!')->with('type', 'success');
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
