<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use DB;

class ApiProductController extends Controller
{
    //Restful API

    public function detail($product_id){
        $details_product = DB::table('tbl_product')
        ->join('tbl_product_features','tbl_product_features.product_id','=','tbl_product.product_id')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product')     //sanphamlienquan
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotin('tbl_product.product_id',[$product_id])->get();            //whereNotin tru ra id san pham da lay (san pham duoc chon)

        $arr = [
            'status' => true,
            'message' => "Chi tiet san pham",
            'details_product'=>$details_product,
            'related_product'=>$related_product,
            ];
            return response()->json($arr, 200);
    }

    public function index(){
        $products = Product::all();
        $arr = [
        'status' => true,
        'message' => "Tất cả sản phẩm",
        'all_product'=>ProductResource::collection($products)
        ];
        return response()->json($arr, 200);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $input = $request->all(); 
        $validator = Validator::make($input, [
        'product_id' => 'required', 
        'product_name' => 'required', 
        'product_details' => 'required', 
        'category_id' => 'required', 
        'product_price' => 'required', 
        'product_image' => 'required', 
        'product_image_1' => 'required', 
        'product_image_2' => 'required', 
        'product_image_3' => 'required', 
        'product_status' => 'required'
        ]);
        if($validator->fails()){
            $arr = [
            'success' => false,
            'message' => 'Lỗi kiểm tra dữ liệu',
            'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
            }
            $product = Product::create($input);
            $arr = ['status' => true,
                'message'=>"Sản phẩm đã lưu thành công",
                'data'=> new ProductResource($product)
            ];
        return response()->json($arr, 201);
}       

    public function show($product_id) { 
        $product = Product::find($product_id);
        if (is_null($product)) {
            $arr = [
            'success' => false,
            'message' => 'Không có sản phẩm này',
            'dara' => []
            ];
            return response()->json($arr, 200);
        }
        $arr = [
        'status' => true,
        'message' => "product_",
        'data'=> new ProductResource($product)
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
