<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\OrderDetail;
use App\Response;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function GetTransaction(){
        $response =  new Response();
        $arr = array();
        $transaction = DB::table('transaction')
        ->get();
        $order_details = DB::table('order-detail')
        ->join('product','order-detail.product_id','=','product.id')
        ->select('order-detail.*','product.price','product.discount')
        ->get();
     
        if(empty($transaction)){    
            $response->status=0;
            $response->message="Chưa có đơn hàng nào";
        }else{
            for ($index=0;$index<count($transaction);$index++) {
                $transaction[$index]->product = array();
                for($i=0;$i<count($order_details);$i++){
                    if($transaction[$index]->id == $order_details[$i]->transaction_id){
                        array_push($transaction[$index]->product, $order_details[$i]);
                    }
                }
              
            }
            $response->data = $transaction;
            $response->status=1;
            $response->message="";
        }
      return json_encode($response,true);
    }
}
