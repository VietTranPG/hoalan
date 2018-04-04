<?php

namespace App\Http\Controllers;
use Validator;  
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Response;
use \stdClass;
class UserController extends Controller
{
    public function Register(Request $request){
        $user = new User();
        $response =  new Response();
        $messages = [
            'email.required' => 'Cần Nhập Email',
            'name.required' => 'Cần Nhập Tên',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Cần Nhập Password',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],$messages);
        if($validator->fails()){
            $response->status = 0;
            $response->message = $validator->errors()->first();           
        }else{
            $userExits = DB::table('users')->where('email',$request->email)->first();
            if($userExits){
                $response->status = 0;
                $response->message = "Email đã tồn tại";
            }else{
                $user->name= $request->name;
                $user->email= $request->email;
                $user->password= bcrypt($request->password);
                $user->remember_token=bcrypt(str_random(12));
                $user->save();
                $res = new \stdClass();
                $res->name = $request->name;
                $res->email = $request->email;
                $res->remember_token = $user->remember_token;
                $response->data = $res;
                $response->status = 1;
                $response->message = 'success';
            }
        }
        return json_encode($response);    
    }
    public function Login(Request $request){
        
    }
}