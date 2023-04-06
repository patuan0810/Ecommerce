<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class LogoutController extends Controller
{

    public function logout(Request $request) {
        
        $request->user()->tokens()->delete();
        Auth::logout();
        return redirect('/trang-chu');
    }


}