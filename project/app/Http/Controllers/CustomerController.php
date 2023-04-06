<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_customer(){


        return view('admin.customer.customer');
    }
    public function index()
    {
        $customer = Customer::all();
        $arr = [
        'status' => true,
        'message' => "list customer",
        'data'=>$customer
        ];
         return response()->json($arr, 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
      
      $cus = Customer::where('customer_id',$request->customer_id)->get();
      return response()->json([
        'data'=>$cus
      ]);
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
      $user = user::where('id',$request->customer_id)->update([
        'name'=>$request->customer_name,
      ]);;
      $cus = Customer::where('customer_id',$request->customer_id)->update([
        'customer_name'=>$request->customer_name,
        'customer_address'=>$request->customer_address,
        'customer_phone'=>$request->customer_phone,
      ]);
      if($cus){
        return response()->json([
          'message' =>"cap nhat thanh cong",
          'code'    =>"200",
          'data'    => $cus
        ]);
      }
      else{
        return response()->json([
          'message'=>"cap nhat khong thanh cong",
          'code'=>"500",
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result =Customer::where('customer_id',$request->id)->delete();
        if($result){
          return response()->json([
            'message'=>"oke",
            'code'=>"200",
          ]);
        }
        else{
          return response()->json([
            'message'=>"error",
            'code'=>"500",
          ]);
        }
    }
}
