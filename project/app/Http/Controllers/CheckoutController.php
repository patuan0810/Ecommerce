<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class CheckoutController extends Controller
{

    public function checkout(){
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category');

        return view('pages.checkout', [
            'category_product'=>$category_product['all_category_product'], 
        ]);
    }
    
    public function shipping_save(Request $request){
        
        $shipping = array();
        $shipping['shipping_name'] = $request->shipping_name;
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['shipping_phone'] = $request->shipping_phone;
        $shipping['shipping_email'] = $request->shipping_email;
        $shipping['shipping_notes'] = $request->shipping_notes;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($shipping);
        
        Session::put('shipping_id',$shipping_id);
        return Redirect('/payment');
    }

    public function payment(){
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category');

        return view('pages.payment', [
            'category_product'=>$category_product['all_category_product'], 
        ]);
        }

    public function order_place(Request $request){
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category');

        $user_email = Auth::user()->email;
        $customer = DB::table('users')
        ->join('tbl_customer','tbl_customer.customer_email','=','users.email')
        ->where('tbl_customer.customer_email',$user_email)->where('users.is_admin','0')->get();

        foreach($customer as $cus_id){
            $customer_id = $cus_id->customer_id;
        }
        
        // insert payment_method
        $data= array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';

        $ship_id = Session::get('shipping_id');
        //insert order
        
        $content = Cart::content();
        $total = 0;
        foreach($content as $v_content){

        $total += $v_content->price * $v_content->qty;
        }
        $order_data = array();
        // $order_data['customer_id'] = 'customer_id';
        $order_data['customer_id'] = $customer_id;
        $order_data['shipping_id'] = $ship_id;
        $order_data['order_total'] = $total;
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);
    
        //insert order_detail
        
        foreach($content as $v_content){
            $order_d_data = array();    
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method'] == 1){
            Cart::destroy();
            return view('pages.order', [
                'category_product'=>$category_product['all_category_product'], 
            ]);
        } else{
            echo '<script>alert("Vui lòng chọn phương thức thanh toán")</script>';
            return view('pages.payment', [
                'category_product'=>$category_product['all_category_product'], 
            ]);
        }
        // return view('pages.order')->with('category',$category_product)->with('filter_size',$filter_size);
    }

}
