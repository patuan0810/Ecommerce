<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\support\Facades\Http;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Cart;
use Redirect;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function save_cart(Request $request){
        
        $productId = $request->productid_hidden;    //lay id san pham  
        $quantity = $request->qty;              //lay so luong   

        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
        
        // return dd($product_info);

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;

        Cart::add($data);       


        // Cart::destroy();
        // Cart::add('293ad', 'Product 1', 1, 9.99);

        return Redirect::to('/show_cart'); //quay lai show_cart
    }

    public function show_cart(Request $request){
        $category_product = Http::get('http://127.0.0.1:8080/api/client/api_all_category');

        return view('pages.show_cart', [
            'category_product'=>$category_product['all_category_product'], 
        ]);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);        //xóa sản phẩm dựa vào rowId
        return Redirect::to('/show_cart');
    }

    public function update_quantity(Request $request){
        $rowID = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowID, $qty);

        return Redirect::to('/show_cart');
    }


}
