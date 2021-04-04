@extends('front.front')

@section('title')
    Add item
@endsection
@section('Content')
    <form class="additem" action="" method="POST">
        @csrf
        <input type="text" name="name" class="product" placeholder="Name" >
        <input type="text" name="howmuch" class="product" placeholder="How Much ?">
        <input type="text" name="image" class="product" placeholder="SRC?">
        <button type="submit">Submit</button>
    </form>
@endsection
@section('cs')

@endsection
