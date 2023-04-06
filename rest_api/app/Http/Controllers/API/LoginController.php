<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use GuzzleHttp\Client;
use AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\BaseController;

class LoginController extends BaseController
{
    
     

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  
    protected $redirectTo = '/trang-chu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
   
    
    
    public function login(Request $request)
    {   
        $input = $request->all();
        $remember_me = $request->filled('remember_me');
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']), $remember_me))
        {
            $user = Auth::user();
            $success['id'] = $user->id;
            $success['is_admin'] = $user->is_admin;
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['remember_me'] = $remember_me;
            
            return $this->sendResponse($success, 'Đăng nhập thành công.');
        }else {
            return $this->sendError('Lỗi xác thực');
        }
        
          
    }
    


    // public function login(Request $request) {

    //     $remember = $request->has('remember_me') ? true : false;
        
    //     if (Auth::attempt([
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ], $remember)) {
    //         return redirect()->to('trang-chu');
    //     }
    //     else{
    //         return view('pages.login');

    //     }


    // }
}
    

    
