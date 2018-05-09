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
      
        $arr = array();
        $transaction = DB::table('transaction')
        ->get();
        $order_details = DB::table('order-detail')
        ->join('product','order-detail.product_id','=','product.id')
        ->select('order-detail.*','product.name as product_name','product.price','product.discount','product.image_link')
        ->get();     
        if(empty($transaction)){              
        }else{
            for ($index=0;$index<count($transaction);$index++) {
                $transaction[$index]->product = array();
                for($i=0;$i<count($order_details);$i++){
                    if($transaction[$index]->id == $order_details[$i]->transaction_id){
                        array_push($transaction[$index]->product, $order_details[$i]);
                    }
                }
              
            }
        }
        return view('admin.modules.transaction',['transaction'=>$transaction]); 
     
    }
}