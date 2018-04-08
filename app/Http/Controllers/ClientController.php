<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\Transaction;
use App\OrderDetail;
use App\Response;
use Mail;
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
        $token = $request->header('token');
        $user = $this->GetUserbyToken($token);    
        if($user){
            $user_id = $user->id;             
            $orderDetail = new OrderDetail();
            $transaction = new Transaction();  
            $transaction->status = 1;
            $transaction->user_id = $user_id;
            $transaction->user_name = $user->name;
            $transaction->user_email = $user->email;  
            $transaction->message =  $request->message;
            $transaction->created = date('Y-m-d H:i:s');
            $transaction->user_phone = $request->phone;
            $transaction->address = $request->address;
            $transaction->save();             
            $orders = array();          
            foreach ($request->product as $item) {
                $orders[] = array(
                    "transaction_id" => $transaction->id,
                    "product_id" => $item['id'],
                    "qty"=> $item['qty']
                );
            }
            $orderDetail::insert($orders);
            $response->status=1;
            $response->message="Thành công";
        }else{
            $response->status=0;
            $response->message="Bạn phải login";
        }
        return json_encode($response);
    }
    public function GetUserbyToken($token){
        $user = DB::table('users')->where('remember_token',$token)->first();
        return $user;
    }

    public function sendMail(){
        Mail::send('mailToCustome', array('content'=>'Sendmail test'), function($message){
	        $message->to('viet.tranhoang@powergatesoftware.com', 'Visitor')->subject('Visitor Feedback!');
	    });
    }
}