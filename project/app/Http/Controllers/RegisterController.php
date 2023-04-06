<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show_register() {
        return view('auth.register');
    }

    public function registerApi(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

            $http = new \GuzzleHttp\Client;

            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $c_password = $request->c_password;

            $response = $http->post('http://127.0.0.1:8080/api/dang-ky', [
                'headers'=>[
                    'Authorization'=>'Bearer'.session()->get('token.access_token')
                ],
                'query'=>[
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'c_password' => $c_password,
                ]
            ]);

            $result = json_decode((string)$response->getBody(), true);
            $success = $result['success'];

            if($success == true) {
                echo '<script>alert("Đăng ký thành công!")</script>';
                return view('auth.login');
            }else if($success == false){
                
                echo '<script>alert("Đăng ký thất bại!")</script>';
                return view('auth.register');
                // return redirect()->route('dang-ky');
            }
  
    }


}
    