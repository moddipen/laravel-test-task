<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
class ProductController extends Controller
{
    public function admin_product_list(){
        $prodcuts = Product::get();
        return view("admin.products",["products"=>$prodcuts]);
    }
}
