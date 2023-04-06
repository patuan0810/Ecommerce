<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function show_order(){
        return view('admin.order.order');

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
public function list_order(){
    $date=Order::all();
    $order=DB::table('tbl_order')
    ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')->select(
        'tbl_order.order_id',
        'tbl_order.order_status',
        'tbl_shipping.shipping_name',
        'tbl_shipping.shipping_email',
        'tbl_shipping.shipping_address',
        'tbl_shipping.shipping_phone',
        'tbl_order.created_at',
    )->get();
    if($order){
        $arr =[
            'status'=>true,
            'message'=>'oke',
            'data'=>$order,
            // 'date'=>$date
        ];
        return response()->json($arr);
    }
    return response()->json([
        'status'=>false,
        'message'=> 'no oke'
    ]);
}
public function details(Request $request){
    $order=DB::table('tbl_order')
    ->leftjoin('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    ->leftjoin('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')->select(
        "tbl_order.order_id",
        "tbl_order.customer_id",
        "tbl_shipping.shipping_id",
        "tbl_order.order_total",
        "tbl_order.order_status",
        "tbl_order.created_at",
        "tbl_shipping.shipping_name",
        "tbl_shipping.shipping_address",
        "tbl_shipping.shipping_phone",
        "tbl_shipping.shipping_email",
        "tbl_shipping.shipping_notes",
        "tbl_order_details.order_details_id",
        "tbl_order_details.product_id",
        "tbl_order_details.product_name",
        "tbl_order_details.product_price",
        "tbl_order_details.product_sales_quantity"
    )->get();
    if($order){
        $arr =[
            'status'=>true,
            'message'=>'oke',
            'data'=>$order,
            // 'date'=>$date
        ];
        return response()->json($arr);
    }
    return response()->json([
        'status'=>false,
        'message'=> 'error'
    ]);
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
        $order=order::where('order_id',$request->id)->update([
            'order_status'=>'Đã xử lý'
        ]);
        if($order){
            return response()->json([
                'status'=>true,
                'data'=>$order,
                'message'=>'xu ly thanh cong'
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
        $order=order::where('order_id',$request->id)->delete();
        if($order){
            return response()->json([
                'status'=>true,
                'data'=>$order,
                'message'=>'Xoa thanh cong'
            ]);
        }
        else{
            return response()->json([
                'status'=>false,
                'data'=>$order,
                'message'=>'error'
            ]);
        }
    }
}
