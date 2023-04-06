<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class ResetController extends BaseController
{
    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Lỗi nhập thông tin');       
        };
        $user = auth()->user(); 

        if( Hash::check($request->old_password, $user->password)) {
        
            $user->update([
                'password' => bcrypt($request->password)
            ]);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            // $success['token'] =  $user->createToken('MyApp')->accessToken; 
            
            return $this->sendResponse($success, 'Đổi mật khẩu thành công');
 
            // $success['token'] =  $user->createToken('MyApp')-> plainTextToken; 
            // return $this->sendResponse($success, 'Đổi mật khẩu thành công');
            // return $this->sendMess('Đổi mật khẩu thành công');
        }else {
            return $this->sendError('Mật khẩu cũ không đúng');
        }
    } 
}
