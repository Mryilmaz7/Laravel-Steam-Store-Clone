<?php

namespace App\Http\Controllers;

use App\Models\Balance;

use App\Models\Posts;
use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Products $product)
    {
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->howmuch,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        return redirect()->route('admin.index');
    }
    public function index(){

        $cartItems= \Cart::session(auth()->id())->getContent();
        $user=auth()->user();
        return view('cart.bag',compact('cartItems'),[
        'user'=>$user,

            ]);
    }
    public function destroy($itemId){
        \Cart::session(auth()->id())->remove($itemId);
        return back();
    }
    public function alldestroy(){

        return back();
    }


}
