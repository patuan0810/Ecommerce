<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\category as CategoryResource;

class CategoryController extends Controller
{
   
    public function show_category_admin(){
        return view('admin.category.category');
    }
    public function index()
    {
        $category = CategoryProduct::all();
        $arr = [
        'status' => true,
        'message' => "list category",
        'data'=>CategoryResource::collection($category)
        ];
         return response()->json($arr, 200);
    }

    public function store(Request $request)
    {              
            $input = $request->all(); 
            $validator = Validator::make($input, [
              'category_name' => 'required', 'category_status' => 'required'
            ]);
            if($validator->fails()){
               $arr = [
                 'success' => false,
                 'message' => 'Lỗi kiểm tra dữ liệu',
                 'data' => $validator->errors()
               ];
               return response()->json($arr, 200);
            }
            $category = CategoryProduct::create($input);
            $arr = [
              'status' => true,
               'message'=>"Danh mục đã lưu thành công",
               'data'=>$category
            ];
            return response()->json($arr, 201);          
    }
    public function destroy(Request $request){
      $result =CategoryProduct::where('category_id',$request->id)->delete();
      if($result){
        return response()->json([
          'message'=>"oke",
          'code'=>"200",
        ]);
      }
      else{
        return response()->json([
          'message'=>"error",
          'code'=>"500",
        ]);
      }
   }
   public function edit(Request $request ){
    $category  = DB::table('tbl_category_product')->where('category_id',$request->category_id)->first();
    if($category){
      return response()->json([
        'message'=>"oke",
        'code'=>"200",
        'data'=>$category
      ]);
    }
    else{
      return response()->json([
        'message'=>"Khong ton tai",
        'code'=>"500",
      ]);
    }
   }
   public function update(Request $request){
    $category = CategoryProduct::where('category_id',$request->category_id)->update([
      'category_name'=>$request->category_name,
      'category_status'=>$request->category_status
    ]);
    if($category){
      return response()->json([
        'message' =>"cap nhat thanh cong",
        'code'    =>"200",
        'data'    => $category
      ]);
    }
    else{
      return response()->json([
        'message'=>"cap nhat khong thanh cong",
        'code'=>"500",
      ]);
    }
  }

  public function show($category_id) {
        $category  = DB::table('tbl_category_product')->where('category_id',$category_id)->first();
        if (is_null($category)) {
          $arr = [
            'success' => false,
            'message' => 'Không có danh mục này',
            'data' => []
          ];
          return response()->json($arr, 200);
        }
        $arr = [
          'status' => true,
          'message' => "Chi tiết danh mục ",
          'data' => array($category)
        ];
        return response()->json($arr, 201);
   }
}

