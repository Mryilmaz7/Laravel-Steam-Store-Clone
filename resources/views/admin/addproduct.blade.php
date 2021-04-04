@extends('front.front')

@section('title')
Add Product
@endsection
@section('Content')
<form class="addproduct" action="" method="POST">
    @csrf
    <input type="text" name="name" class="product" placeholder="Name" >
    <input type="text" name="howmuch" class="product" placeholder="How Much ?">
    <input type="text" name="content" class="product" placeholder="Content...">
    <input type="text" name="image" class="product" placeholder="SRC?">
    <input type="text" name="imagetwo" class="product" placeholder="SRC?">
    <input type="text" name="imagethree" class="product" placeholder="SRC?">
    <button type="submit">Submit</button>
</form>
@endsection
@section('cs')
@endsection
