<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use DB;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;


// use AuthenticatesUsers;
class LoginController
{
    
    public function show_login()
    {
        return view('auth.login');
    
        
    }

    public function loginApi(Request $request)
    {
        $http = new \GuzzleHttp\Client;

        $email = $request->email;
        $password= $request->password;
        $remember_me = $request->remember_me;

        $response = $http->post('http://127.0.0.1:8080/api/dang-nhap', [
            'headers'=>[
                'Authorization'=>'Bearer'.session()->get('token.access_token')
            ],
            'query'=>[
                'email'=>$email,
                'password'=>$password,
                'remember_me' => $remember_me
            ]
        ]);

        $result = json_decode((string)$response->getBody(),true);

        $success = $result['success'];
        
        if($success == true) {
            $data = $result['data'];
            $is_admin = $data['is_admin'];
            $id = $data['id'];
            $remember = $data['remember_me'];
            if($is_admin == 0) {
                if($remember == true) {
                    Auth::loginUsingId($id, true);
                }else if($remember == false) {
                    Auth::loginUsingId($id);
                }
                //
                $category_id = $request->category_id;
                $all_product = Http::get('http://127.0.0.1:8080/api/client/api_all_product');
                $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category');
                $category  = Http::get('http://127.0.0.1:8080/api/client/api_all_canon');

                echo '<script>alert("Bạn đã đăng nhập thành công với tư cách Khách Hàng!")</script>';
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
                // return redirect()->route('trang-chu');
            }else if($is_admin == 1){
                if($remember == true) {
                    Auth::loginUsingId($id, true);
                }else if($remember == false) {
                    Auth::loginUsingId($id);
                }
                //
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
                echo '<script>alert("Bạn đã đăng nhập thành công với tư cách Quản Trị Viên!")</script>';
                return view('admin.dashboard', $arr);
                // return redirect()->route('dashboard');
            }
        }else {
            echo '<script>alert("Đăng Nhập thất bại!")</script>';
            return view('auth.login');
        }
    
    }
}
    

    
