<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getAll(){
        $new = News::All();
        return view('admin.modules.news',['news'=> $new ]); 
    }
    public function add(Request $request){
        $news = new News;
        $news->title = $request->title;
        $news->text = $request->text;      
       
        $news->save();
        return redirect('news');
    }
    public function update(Request $request){
        $news = News::find($request->id);
        if(!empty($news)){
            $news->title = $request->title;
            $news->text = $request->text; 
            $news->save();           
        }   
        return redirect('news');
    }
    public function delete(Request $request){
        $news = News::find($request->id);
        if(!empty($news)){
            $news->delete();
        }     
        return redirect('news');
    }
}
