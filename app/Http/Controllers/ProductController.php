<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $product_name = $request->product_name;
        $products = Product::where('product_name','LIKE','%'.$product_name.'%')
        ->paginate(50);
        return view('product.index',compact('products','product_name'))->with('i',(request()->input('page', 1)-1)* 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_name' => 'required',
            'spec' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'diskon_price' => 'required',
        ]);
        $input = $request->all();
        Product::create($input);
        return redirect()->route('product.index')->with('success','Data has been saved');
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
        $product = Product::find($id);
        return view('product.edit',compact('product'));
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
        $request->validate([
            'product_name' => 'required',
            'spec' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'diskon_price' => 'required',
        ]);
        $input = $request->all();
        $product = Product::find($id);
        $product->update($input);
        return redirect()->route('product.index')->with('succes','Data has been updated');
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
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','Data has been deleted');
    }
}
