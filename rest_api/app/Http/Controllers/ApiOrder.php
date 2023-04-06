<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use DB;

class ApiOrder extends Controller
{
    public function index(){
        $order = Order::all();
        $arr = [
        'status' => true,
        'message' => "đơn hàng",
        'api_order'=>$order
        ];
        return response()->json($arr, 200);
    }
    
}
