<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Library;
use App\Models\Posts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class FrontController extends Controller
{
    //Index page
 public function index()
 {
     $user = auth()->user();
     if ($this->middleware('auth')) {
         return view('notlogin.index', [
             'user' => $user,
         ]);
     }
     else
         return view('admin.index',[
             'user'=>$user,
         ]) ;
 }
    // Games and database
    public function Games()
    {
        $user= auth()->user();
           $games = Products::select('name','howmuch','image','imagetwo','imagethree','id','content')->get();

           return view('notlogin.index',[
               'games' => $games,
               'user'=>$user,
           ]);

    }
    public function genres($genre){
        $user=auth()->user();
        $library=Library::select('id','user_id','product_name','product_id')->where('user_id',auth()->id())->get() ;
        $genres=Products::select('id','name','howmuch','image','imagetwo','imagethree','content','genres')->where('genres',$genre)->get();
        return view('notlogin.category',[
            'genre'=>$genre,
            'user'=>$user,
            'genres'=>$genres,
            'library'=>$library
        ]);
    }
    public function showgame(Products $genre,Request $request){
        $user_id=auth()->id();
        $data=[
            'user_id'=>$user_id,
        ];
        Posts::create($data);

    }
}
