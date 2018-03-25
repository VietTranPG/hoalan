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
    public function add(Request $request){
        $product = new Product;      
        $product->catalog_id = $request->catalog_id;
        $product->name = $request->name;
        $product->price = $request->price;      
        $product->discount = $request->discount;
        $product->content = $request->content;
        if( $request->hasFile('image')){
            $file = $request->file('image');
            $image_link = str_random(12)."_".$file->getClientOriginalName();
            $file->move("upload/product",$image_link);
            $product->image_link = $image_link;
        }
        $product->save();
        return redirect('product');
    }
}
