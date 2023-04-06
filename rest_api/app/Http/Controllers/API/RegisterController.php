<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Customer;
use App\Http\Controllers\API\BaseController;


class RegisterController extends BaseController
{
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return $this->sendError('Lỗi nhập thông tin');       
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['is_admin'] = '0';

        $user = User::create($input);

        if($user) {
            Customer::create([
                'customer_id' => $user->id,
                'customer_name' => $request->name,
                'customer_email' =>$request->email,
            ]);
            $success['id'] = $user->id;
            $success['token'] =  $user->createToken('MyApp')-> plainTextToken; 
           
            return $this->sendResponse($success, 'Đăng ký thành công');
        }else {
            return $this->sendError('Đăng ký thất bại');
        }
        
        
    }
}
