<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    
    public function index()
    {
        
        return view('admin.admin_login');
    }
    public function show_dashboard()
    {
        $Order=DB::table('tbl_order')->count();
        $Admin=DB::table('tbl_admin')->count();
        $Category=DB::table('tbl_category_product')->count();
        $Product=DB::table('tbl_product')->count();
        $Customer=DB::table('tbl_customer')->count();
        $User=DB::table('users')->count();
        $arr=[
            'Order'=> $Order,
            'Admin'=> $Admin,
            'category'=> $Category,
            'Product'=> $Product,
            'Customer'=> $Customer,
            'User'=> $User,
        ];
        return view('admin.dashboard',$arr);
    }
}
