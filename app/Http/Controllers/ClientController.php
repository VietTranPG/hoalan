<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
class ClientController extends Controller
{
    public function Home(){
        $product = DB::table('product')
        ->join('category','product.catalog_id','=','category.id')
        ->select('product.*', 'category.name as category_name')
        ->get();
        return view('client.modules.home',['product'=>$product]); 
    }
    public function Detail($id){
        $product = DB::table('product')
        ->join('category','product.catalog_id','=','category.id')
        ->select('product.*', 'category.name as category_name')
        ->where('product.id',$id)
        ->first();
        $category_id = $product->catalog_id;
        $listSameCategory =  DB::table('product')
        ->join('category','product.catalog_id','=','category.id')
        ->select('product.*', 'category.name as category_name')
        ->where('product.catalog_id',$category_id)
        ->Where('product.id','<>',$id)
        ->get();
        return view('client.modules.detail',['product'=>$product,'sameCategory'=>$listSameCategory]); 
    }
}
