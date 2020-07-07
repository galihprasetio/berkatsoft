<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $customer_name = $request->customer_name;
        $customers = Customer::where('customer_name','LIKE','%'.$customer_name.'%')
        ->paginate(50);
        return view('customer.index',compact('customers','customer_name'))->with('i',(request()->input('page', 1)-1)* 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer.create');
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
            'customer_name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'province' => 'required',
            'contact_person' => 'required',
           
        ]);
        $input = $request->all();
        Customer::create($input);
        return redirect()->route('customer.index')->with('success','Data has been saved');
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
        $customer = Customer::find($id);
        return view('customer.edit',compact('customer'));
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
            'customer_name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'province' => 'required',
            'contact_person' => 'required',
           
        ]);
        $input = $request->all();
        $customer = Customer::find($id);
        $customer->update($input);
        return redirect()->route('customer.index')->with('success','Data has been updated');
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
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success','Data has been deleted');
    }
}
