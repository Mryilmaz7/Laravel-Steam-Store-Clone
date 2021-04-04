@extends('front.front')

@section('title')
ADD BALANCE
@endsection
@section('Content')

    <form class="form" method="POST" action="">
        @csrf
        <br>
        <label class="about">This is an add balance form.{{auth()->user()->name}}</label><br>
        <input class="input" type="number" name="balance" placeholder="0"><br><br>

        <button class="submit" type="submit"> SUBMIT</button>


    </form>

@endsection
@section('cs')

@endsection
