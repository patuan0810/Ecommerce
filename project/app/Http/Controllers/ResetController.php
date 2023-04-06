<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class ResetController extends Controller
{
    public function show_reset() {
        return view('auth.reset');
    }

    public function resetApi(Request $request) {
        
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        

        $http = new \GuzzleHttp\Client;
        $old_password = $request->old_password;
        $password = $request->password;
        $c_password = $request->c_password;

        $user = $request->user()->token;
        dd($user);
        

        // $response = $http->post('http://127.0.0.1:8080/api/doi-mat-khau', [
        //     'headers'=>[
        //         // 'Accept'     => 'application/json',
        //         'Authorization'=>'Bearer'.session()->get('token.access_token')
        //     ],
        //     'query'=>[
        //         'old_password' => $old_password,
        //         'password' => $password,
        //         'c_password' => $c_password,
        //     ]
        // ]);

        
        $result = json_decode((string)$response->getBody(), true);
        
        // return redirect()->route('trang-chu');
        // try{
            
        // }catch(\Exception $e){
        //     return redirect()->back()->with('error', 'Đăng nhập thất bại!', 'Xin hãy thử lại!');
        // }
    }
}
