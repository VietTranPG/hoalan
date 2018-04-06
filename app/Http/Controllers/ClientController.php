<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Transaction;
use App\OrderDetail;
use App\Response;
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
    public function Search(Request $request){
        $product = DB::table('product')
        ->join('category','product.catalog_id','=','category.id')
        ->select('product.*', 'category.name as category_name')
        ->where('product.name','like','%'.$request->keySearch.'%')
        ->get();
        return view('client.modules.home',['product'=>$product]); 
    }
    public function GotoCart(){
        return view('client.modules.cart'); 
    }
    public function AddCart(Request $request){
      
        $response =  new Response();
        $product = DB::table('product')->where('id', $request->id)->first();
        if(empty($product)){
            $response->status=0;
            $response->message="Không có mã sản phẩm này";
        }else{
            $token = $request->header('token');
            $user = $this->GetUserbyToken($token);
            if($user){
                $user_id = $user->id;
                $cart =  DB::table('transaction')->where('user_id',$user_id)->where('status',1)->first();
                if(empty($cart)){
                    $order = new OrderDetail();
                    $transaction = new Transaction();    
                    $transaction->status = 1;
                    $transaction->user_id = $user_id;
                    $transaction->user_name = $user->name;
                    $transaction->user_email = $user->email;   
                    $transaction->save();   
                    $order->transaction_id = $transaction->id;    
                    $order->product_id = $request->id;
                    $order->qty=1;       
                    $order->save();                           
                }else{
                    $order = OrderDetail::where('product_id', $request->id)->first();
                    if(empty($order)){                      
                        $order = new OrderDetail();
                        $order->transaction_id = $cart->id;    
                       
                        $order->product_id = $request->id;
                        $order->qty=1;       
                        $order->save();     
                    }else{                     
                        $order->qty+=1;
                        $order->save();                        
                    }                   
                }
                $response->status=1;
                $response->message="success";
            }else{
                $response->status=0;
                $response->message="Bạn phải login";
            }
        }        
        return json_encode($response);
    }
    public function GetUserbyToken($token){
        $user = DB::table('users')->where('remember_token',$token)->first();
        return $user;
    }
    public function GetCartDetail(Request $request){
        $response =  new Response();    
        $token = $request->header('token');
        $user = $this->GetUserbyToken($token);
        if(empty($user)){
            $response->status=0;
            $response->message="Bạn phải login";
        }else{
            $cart =  DB::table('transaction')
            ->where('transaction.user_id',$user->id)
            ->where('transaction.status',1)->first();
            $oderDetal = DB::table('order-detail')
            ->join('product','product.id','=','order-detail.product_id')
            ->select('order-detail.*','product.image_link','product.price','product.discount','product.name')
            ->where('transaction_id',$cart->id)->get();
            $cart->details=$oderDetal;
            $response->status=1;
            $response->message="";
            $response->data=$cart;
        }
       return json_encode($response);
    }
}