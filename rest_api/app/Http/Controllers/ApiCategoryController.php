<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryProductResource;
use App\Models\CategoryProduct;
use DB;


class ApiCategoryController extends Controller
{
    public function category_name(){
        $canon_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id','1')->limit(1)->get();
        $canon = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_category_product.category_id','1')->get();  
        $sony_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id','2')->limit(1)->get();
        $sony = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_category_product.category_id','2')->get();  
        $nikon_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id','3')->limit(1)->get();
        $nikon = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_category_product.category_id','3')->get();  
        $fujifilm_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id','4')->limit(1)->get();
        $fujifilm = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_category_product.category_id','4')->get();  
        $arr = [
        'status' => true,
        'message' => "CANON",
        'canon_name'=>$canon_name,
        'canon'=>$canon,
        'sony_name'=>$sony_name,
        'sony'=>$sony,
        'nikon_name'=>$nikon_name,
        'nikon'=>$nikon,
        'fujifilm_name'=>$fujifilm_name,
        'fujifilm'=>$fujifilm
        ];
        return response()->json($arr, 200);
    }
    public function cate_by_id($category_id){
        $category_by_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get(); 
        $arr = [
        'status' => true,
        'message' => "cate name",
        'category_b_name'=> $category_by_name,
        'category_by_id'=> $category_by_id,
        ];
        return response()->json($arr, 200);
    }
    //Restful API
    public function index(){
        $category_product = CategoryProduct::all();
        $arr = [
        'status' => true,
        'message' => "all_category_product",
        'all_category_product'=>CategoryProductResource::collection($category_product)
        ];
        return response()->json($arr, 200);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $input = $request->all(); 
        $validator = Validator::make($input, [
        'category_id' => 'required', 
        'category_name' => 'required', 
        'category_status' => 'required'
        ]);
        if($validator->fails()){
            $arr = [
            'success' => false,
            'message' => 'Lỗi kiểm tra dữ liệu',
            'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
            }
            $category_product = CategoryProduct::create($input);
            $arr = ['status' => true,
                'message'=>"Sản phẩm đã lưu thành công",
                'data'=> new CategoryProductResource($category_product)
            ];
        return response()->json($arr, 201);
}       

    public function show($category_id) { 
        $category_product = CategoryProduct::find($category_id);
        if (is_null($category_by_name)) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'dara' => []
            ];
            return response()->json($arr, 200);
        }
        $arr = [
        'status' => true,
        'message' => "category_product_",
        'data'=> new CategoryProductResource($category_product)
        ];
        return response()->json($arr, 201);
    }

    public function edit($id) {
        //Lấy ra sản phẩm mang product/3 để update
     }

    public function update(Request $request){
        //cập nhật lại sp
    }

    public function destroy($product_id) { 
        // xóa
    }
}
