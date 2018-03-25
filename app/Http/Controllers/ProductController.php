<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function getAll(){
        $product = Product::All();
        $category = Category::All();
        return view('admin.modules.product',['product'=> $product,'category'=>$category]); 
    }
}
