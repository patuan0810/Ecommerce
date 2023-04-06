<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\support\Facades\Http;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'account', 'checkout']]);
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }
    
    public function index(Request $request) {
        $category_id = $request->category_id;
        $all_product = Http::get('http://127.0.0.1:8080/api/client/api_all_product');
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category');
        $category  = Http::get('http://127.0.0.1:8080/api/client/api_all_canon');

        return view('pages.home', [
            'all_product'=>$all_product['all_product'], 
            'category_product'=>$category_product['all_category_product'],
            'canon_name'=>$category['canon_name'],
            'canon'=>$category['canon'],
            'sony_name'=>$category['sony_name'],
            'sony'=>$category['sony'],
            'nikon_name'=>$category['nikon_name'],
            'nikon'=>$category['nikon'],
            ]);
    }
    
    public function introduction() {
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 

        return view('pages.introduction', [
            'category_product'=>$category_product['all_category_product'], 
        ]);
    }

    public function show_contact() {
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 

        return view('pages.contact', [
            'category_product'=>$category_product['all_category_product'], 
        ]);
    }

    public function account() {
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 

        $user_email = Auth::user()->email;
        $customer = DB::table('users')
        ->join('tbl_customer','tbl_customer.customer_email','=','users.email')
        ->where('tbl_customer.customer_email',$user_email)->where('users.is_admin','0')->get();

        foreach($customer as $cus_id){
            $customer_id = $cus_id->customer_id;
        }

        $order_t = DB::table('tbl_order')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->where('tbl_customer.customer_id',$customer_id)->get();
        
        return view('pages.account', [
            'category_product'=>$category_product['all_category_product'], 
            ])->with('customer',$customer)->with('order_t',$order_t);
    }
    public function order_status() {
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 

        $user_email = Auth::user()->email;
        $customer = DB::table('users')
        ->join('tbl_customer','tbl_customer.customer_email','=','users.email')
        ->where('tbl_customer.customer_email',$user_email)->where('users.is_admin','0')->get();

        foreach($customer as $cus_id){
            $customer_id = $cus_id->customer_id;
        }

        $order_t = DB::table('tbl_order')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->where('tbl_customer.customer_id',$customer_id)->get();

        $order_1=DB::table('tbl_order')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')->select(
            'tbl_order.order_id',
            'tbl_order.order_status',
            'tbl_shipping.shipping_name',
            'tbl_shipping.shipping_email',
            'tbl_shipping.shipping_address',
            'tbl_shipping.shipping_phone',
            'tbl_order.created_at',
        )->where('tbl_order.customer_id',$customer_id)->get();

        $order=DB::table('tbl_order')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')->select(
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
        )->where('tbl_order.customer_id',$customer_id)->get();
            // return $order_1;
        return view('pages.order_status', [
            'category_product'=>$category_product['all_category_product'], 
            ])->with('order',$order)->with('order_1',$order_1)->with('customer',$customer);
    }


    public function search(Request $request){
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 
        $keywords = $request->keywords_submit;
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords. '%')->get(); 

        return view('pages.search', [
            'category_product'=>$category_product['all_category_product'], 
            ])->with('search_product',$search_product);
    }
}
