<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function getAll(){
        $category = Category::All();
        return view('admin.modules.category',['category'=> $category ]); 
    }
    public function add(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect('category');
    }
    public function update(Request $request){
        $category = Category::find($request->id);
        if(!empty($category)){
            $category->name = $request->name;
            $category->save();           
        }   
        return redirect('category');
    }
    public function delete(Request $request){
        $category = Category::find($request->id);
        if(!empty($category)){
            $category->delete();
        }     
        return redirect('category');
    }
}
