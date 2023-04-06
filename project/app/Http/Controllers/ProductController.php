<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Http;
use App\Http\Resources\ProductCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\product_features;
use Facade\FlareClient\Http\Response;




class ProductController extends Controller
{

    public function show_product(Request $request){
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 
        $all_product = Product::paginate(6);
        
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by=='tang_dan'){
                $all_product = Product::orderBy('product_price', 'ASC')->paginate(12);
                // echo $all_product;
            }
            else if($sort_by == 'giam_dan'){
                $all_product = Product::orderBy('product_price', 'DESC')->paginate(12);
            }
            elseif($sort_by == 'kytu_az'){
                $all_product = Product::orderBy('product_name', 'ASC')->paginate(12);
            }
            elseif($sort_by == 'kytu_za'){
                $all_product = Product::orderBy('product_name', 'DESC')->paginate(12);
            }
            else if($sort_by == '<15m'){
                $all_product = Product::where('product_price','<' ,'15000000')->orderBy('product_price','ASC')->paginate(12);
            }
            else if($sort_by == '15m-30m'){
                $all_product = Product::where('product_price','>' ,'15000000')->where('product_price','<' ,'30000000')->orderBy('product_price','ASC')->paginate(12);
                // $all_product = Product::whereBetween('product_price',['15000000','30000000'])->paginate(12);
            }
            else if($sort_by == '30m-45m'){
                $all_product = Product::where('product_price','>' ,'30000000')->where('product_price','<' ,'45000000')->orderBy('product_price','ASC')->paginate(12);
            }
            elseif($sort_by == '>45m'){
                $all_product = Product::where('product_price','>' ,'45000000')->orderBy('product_price','ASC')->paginate(12);
            }else{
                $all_product = Product::all();    
            }
        }
        
        return view('pages.product', [
            'category_product'=>$category_product['all_category_product'], 
            ])->with('all_product',$all_product);
    }

    public function details_product($product_id){
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 
        $details_product= Http::get('http://127.0.0.1:8080/api/client/api_product_details/'.$product_id);
        
        return view('pages.product_details', [
            'details_product'=>$details_product['details_product'], 
            'related_product'=>$details_product['related_product'], 
            'category_product'=>$category_product['all_category_product'], 
            ]);
    }
    public function show_category($category_id) {
        $all_product = Http::get('http://127.0.0.1:8080/api/client/api_all_product');
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category'); 
        $category_by_id = Http::get('http://127.0.0.1:8080/api/client/api_category_id/'.$category_id); 
        
        return view('pages.category', [
            'all_product'=>$all_product['all_product'], 
            'category_b_name'=>$category_by_id['category_b_name'], 
            'category_by_id'=>$category_by_id['category_by_id'], 
            'category_product'=>$category_product['all_category_product'], 
            ]);
    }

//admin
public function show_product_admin(){
    $category = DB::table('tbl_category_product')->get();  
    $arr = [
        'category_option'=>$category,
    ];
    return view('admin.product.product',$arr);
}
public function list_product(){   
    $all_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->get();

   if($all_product){

    $arr = ['status' => true,
    'message'=>"OK",
    'data'=> $all_product
];
    return response()->json($arr, 201);}

}

public function update_product(Request $request){
       
    $img = $request->product_image;
    $img = str_replace( "\\", '/', $img );
    $img1 = $request->product_image_1;
    $img1 = str_replace( "\\", '/', $img1 );
    $img2 = $request->product_image_2;
    $img2 = str_replace( "\\", '/', $img2 );
    $img3 = $request->product_image_3;
    $img3 = str_replace( "\\", '/', $img3 );    
    $input=$request->all();
    $validator = Validator::make($input, [
        'product_name' => 'required', 
        'product_details' => 'required', 
        'product_origin' => 'required', 
        'product_quantity'=>'required',
        'product_price' => 'required', 
        'product_guarantee' => 'required', 
        'category_id' => 'required', 
        ]);
        if($validator->fails()){
            $arr = [
            'success' => false,
            'message' => 'Lỗi kiểm tra dữ liệu',
            'data' => $validator->errors()
            ];
            return response()->json($arr, 200);
            } 
            else{
        $product=Product::where('product_id',$request->product_id)->update([
            'product_name' => $request->product_name, 
            'product_details' => $request->product_details,
            'product_origin' => $request->product_origin,
            'product_quantity'=>$request->product_quantity,
            'product_guarantee' => $request->product_guarantee, 
            'category_id' => $request->category_id,  
            'product_price' => $request->product_price,  
            'product_image' => basename($img), 
            'product_image_1' => basename($img1),  
            'product_image_2' => basename($img2), 
            'product_image_3' => basename($img3),  
        ]);            
        $product_features=product_features::where('product_id',$request->product_id)->update([
            'product_id' => $request->product_id, 
            'product_feature_1' => $request->product_feature_1, 
            'product_feature_2' => $request->product_feature_2, 
            'product_feature_3' => $request->product_feature_3, 
            'product_feature_4' => $request->product_feature_4, 
            'product_feature_5' => $request->product_feature_5, 
            'product_feature_6' => $request->product_feature_6, 
        ]);
        if($product){
            return response()->json([
                'status'=>true,
                'data'=>$product,
                'fueture'=>$product_features,
                'message'=>'code ok do ban iu'
            ]);
        }else   
        return response()->json([
            'status'=>false,
            
            'message'=>'sua san pham khong thanh cong'
        ]);       
}
//   }
}
public function store(Request $request){   
    $img = $request->product_image;
    $img = str_replace( "\\", '/', $img );
    $img1 = $request->product_image_1;
    $img1 = str_replace( "\\", '/', $img1 );
    $img2 = $request->product_image_2;
    $img2 = str_replace( "\\", '/', $img2 );
    $img3 = $request->product_image_3;
    $img3 = str_replace( "\\", '/', $img3 );     
    $input = $request->all(); 
    $validator = Validator::make($input, [
        'product_name' => 'required', 
        'product_details' => 'required', 
        'product_origin' => 'required', 
        'product_guarantee' => 'required', 
        'product_quantity'=>'required',
        'product_price' => 'required', 
    ]);
    if($validator->fails()){
        $arr = [
        'success' => false,
        'message' => 'Lỗi kiểm tra dữ liệu',
        'data' => $validator->errors()
        ];
        return response()->json($arr, 200);
        }else{
        $product=Product::create([
            'product_name' => $request->product_name, 
            'product_details' => $request->product_details,
            'product_origin' => $request->product_origin,
            'product_quantity'=>$request->product_quantity,
            'product_guarantee' => $request->product_guarantee, 
            'category_id' => $request->category_id,  
            'product_price' => $request->product_price,  
            'product_image' => basename($img), 
            'product_image_1' => basename($img1),  
            'product_image_2' => basename($img2), 
            'product_image_3' => basename($img3),  
        ]);            
        $product_features=product_features::create([
            'product_id' => $product->product_id, 
            'product_feature_1' => $request->product_feature_1, 
            'product_feature_2' => $request->product_feature_2, 
            'product_feature_3' => $request->product_feature_3, 
            'product_feature_4' => $request->product_feature_4, 
            'product_feature_5' => $request->product_feature_5, 
            'product_feature_6' => $request->product_feature_6, 
        ]);
        if(is_null($product)){
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'error'
            ]);
        }else{
       $arr = ['status' => true,
        'message'=>"sản phẩm đã lưu thành công",
        'data'=> $product,
         ];
         return response()->json($arr, 200);
    }
  }
}
public function show_details($product_id){
    $product  = DB::table('tbl_product')
    ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    ->join('tbl_product_features','tbl_product_features.product_id','=','tbl_product.product_id')->where('tbl_product.product_id',$product_id)->first();
    if (is_null($product)) {
      $arr = [
        'success' => false,
        'message' => 'Không có sản phẩm này',
        'data' => []
      ];
      return response()->json($arr, 200);
    }
    $arr = [
      'status' => true,
      'message' => "Chi tiết sản phẩm ",
      'data' => array($product)
    ];
    return response()->json($arr, 201);
}
public function destroy(Request $request) { 
    $product=product::where(['product_id'=>$request->product_id,])->delete();
    $product_features=product_features::where(['product_id'=>$request->product_id,])->delete();
    if($product){
      return response()->json([
        'message'=>"xóa thành công",
        'code'=>"200",
        'data'=> $product,
        
      ]);
    }
    else{
      return response()->json([
        'message'=>"error",
        'code'=>"500",
      ]);
    }
}
}