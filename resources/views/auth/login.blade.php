@extends('front.loginfront')

@section('title')
Login
@endsection
@section('Content')
    @if(count($errors) >0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
    <form class="form" method="POST" action="{{route('login')}}">
        @csrf
        <br>
        <label class="about">This is a Login form.</label><br>
        <input class="input" type="email" name="email" placeholder="EMAIL"><br><br>
        <input class="input" type="password" name="password" placeholder="PASSWORD"><br><br>
        <button class="submit" type="submit"> SUBMIT</button>


    </form>
@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/register.css') }}">
@endsection
