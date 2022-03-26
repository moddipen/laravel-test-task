<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserProduct;
use Auth;
class ProductController extends Controller
{
    public function admin_product_list(){
        $prodcuts = Product::get();
        return view("admin.products",["products"=>$prodcuts]);
    }

    public function product_list(){
        $prodcuts = Product::where("status",0)->get();
        return view("products",["products"=>$prodcuts]);
    }

    public function purchase(Request $request){
        $get_product_amount = Product::find($request->product_id);
        $total_amount = $get_product_amount->price_per_item * $request->qty;
        $create_user_product_array = array(
            "user_id" => Auth::user()->id,
            "product_id" => $request->product_id,
            "purchase_qty" => $request->qty,
            "total_amount" => $total_amount
        );
        $updateProductQty = $get_product_amount->stock - $request->qty;
        Product::where('id',$request->product_id)->update(["stock"=>$updateProductQty]);
        UserProduct::create($create_user_product_array);
    }
}
