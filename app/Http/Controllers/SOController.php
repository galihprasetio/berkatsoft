<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderSO;
use App\DetailSO;
use App\Product;
use App\Customer;
use Illuminate\Support\Facades\DB;
class SOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $startDate = $request->startDate;
        $startDate = empty($startDate) ? date("Y-m-01"): $startDate;
        $endDate = $request->endDate;
        $endDate = empty($endDate) ? date("Y-m-d"): $endDate;
        $salesOrders = DB::table('header_so')
        ->join('customers','header_so.id_customer','=','customers.id')
        ->select('header_so.*','customers.customer_name','customers.contact_person','customers.email')
        ->whereBetween('header_so.posting_date',[$startDate,$endDate])
        ->paginate(50);
        
        return view('so.index',compact('salesOrders','startDate','endDate'))->with('i',(request()->input('page', 1)-1)* 50);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customer::all();
        $products = Product::all();
        return view('so.create',compact('customers','products'));
    }
    public function getCustomer(Request $request){
        $id_customer = $request->id_customer;
        $data = Customer::find($id_customer);
        return response()->json($data);
    }
    public function getProduct(Request $request){
        $id_product = $request->id_product;
        $data = Product::find($id_product);
        return response()->json($data);
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
        $input = $request->all();
        $so_code = collect(DB::select('select so_code from header_so order by so_code desc limit 1'))->first();
        if(empty($so_code->so_code)){
            $nextSoCode ='SO'.'-100000';
        }else{
            $code = $so_code->so_code;
            $expNum = explode('-', $code);
            $nextSoCode = $expNum[0].'-'.(intval($expNum[1]) + 1);
        }
        $input['so_code'] = $nextSoCode;
        HeaderSO::create($input);
        foreach ($request->id_product as $key => $item) {
            # code...
            DetailSO::create([
                'so_code' => $nextSoCode,
                'id_product' => $request->id_product[$key],
                'qty' => $request->quantity[$key],
            ]);
        }
        return redirect()->route('so.index')->with('success','Data has been saved');
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
