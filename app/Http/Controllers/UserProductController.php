<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserProduct;
use Auth;

class UserProductController extends Controller
{
    public function list(){
        $products = UserProduct::with("product","user")
        ->where("user_id",Auth::user()->id)
        ->get();
        return view("user.products",["products"=>$products]);
    }
}
