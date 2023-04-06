<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends BaseController
{

    public function logout(Request $request) {
        
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
       
        
        
        // $user = Auth::user();
        // Auth::logout();
        $request->user()->currentAccessToken()->delete();
        // auth()->logout();
        // $request->user()->tokens()->delete();
        
        return $this->sendMess('Đăng xuất thành công');
        
    }


}