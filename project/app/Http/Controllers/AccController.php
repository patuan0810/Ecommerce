<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class AccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.acc_admin.acc_admin');
    }

    public function create_acc(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'error'
            ]);    
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['is_admin'] = '1';
        $user = User::create($input);
        $admin=admin::create([
            'admin_id' => $user->id, 
            'admin_name' => $request->name, 
            'admin_email' => $request->email, 
            'admin_phone' => $request->phone, 
            'admin_address' => $request->address, 
        ]);
        $success['id'] = $user->id;
        $success['token'] =  $user->createToken('MyApp')-> plainTextToken; 
            return response()->json([
                'status'=>true,
                'message'=>'oke'
            ]);    
    }
    public function show_list_admin(){

        $acc=DB::table('users')
        ->join('tbl_admin','users.id','=','tbl_admin.admin_id')->get();

        // $acc=admin::all();
        if($acc)
        {
        return response()->json([
        'status'=>true,
        'data'=>$acc,            
        ]);
    }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $acc=DB::table('users')
        ->join('tbl_admin','users.id','=','tbl_admin.admin_id')->where('id',$request->id)->first();
       
        if($acc)
        {
        return response()->json([
        'status'=>true,
        'data'=>$acc,            
        ]);}
        else     
        return response()->json([
        'status'=>false,
        'message'=>'error'           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_edit' => 'required',
            'password_edit' => 'required',
            'c_password_edit' => 'required|same:password_edit',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'error'
            ]);    
        }
        $user = user::where('id',$request->id_acc_edit)->update([
            'name'=>$request->name_edit,
            'password'=>bcrypt($request->password_edit)
          ]);
          $admin=admin::where('admin_id',$request->id_acc_edit)->update([
            'admin_name'=>$request->name_edit,
            'admin_phone'=>$request->phone_edit,
            'admin_address'=>$request->address_edit,
          ]);
          if($user){
            return response()->json([
               'status'=>true,
               'data'=>$user+$admin,
               'message'=>'cap nhat thanh cong'
            ]);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
      
        $user =user::where('id',$request->id)->delete();
        $admin=admin::where('admin_id',$request->id)->delete();
        if($admin){
        return response()->json([
            'status'=>true,
            'data'=>$user,
        ]);
    }
    else      return response()->json([
        'status'=>false,
        'message'=>'error'
    ]);
    }
}