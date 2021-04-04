@extends('front.front')

@section('title')
MyCart
@endsection
@section('Content')
<h3>Your Cart</h3>
 @if(session('error'))<div class="alert alert-danger" role="alert">
     {{session('error')}}
 </div>
 @endif
 @if(session('success'))<div class="alert alert-success" role="alert">
     {{session('success')}}
 </div>
 @endif
<form  action="" method="POST">
    @csrf
    <table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th> Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cartItems as $item)
        <tr>
            <td scope="row">{{$item->name}}</td>
            <td>{{$item->price}}<i class="fas fa-lira-sign"></i></td>
            <td>
                <input type="number" value="{{$item->quantity}}">
            </td>
            <td>
                <a href="{{route('cart.destroy',$item->id)}}">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
<h3>Total Price:{{\Cart::session(auth()->id())->getTotal()}} <i class="fas fa-lira-sign"></i></h3>
<a class="addto btn btn-success" href="{{route('admin.buy')}}"  >Buy</a>

<?php
$total =\Cart::session(auth()->id())->getTotal();
?>

@if($total > $user->balance)
    <h3>
        Insufficient Balance. </h3>

@endif


</form>

@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/cart.css') }}">
@endsection
