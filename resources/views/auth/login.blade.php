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
    <div class="containers">
        <div class="container">
            <form class="form" method="POST" action="{{route('login')}}">
        @csrf
        <br>
        <label class="about">PLEASE LOGIN</label><br>
        <h3 class="label1"> Steam email</h3>
        <input class="input" type="email" name="email" ><br><br>
        <h3 class="label2"> Password</h3>
        <input class="input" type="password" name="password"><br><br>
        <button class="submit" type="submit"> SUBMIT</button>


         </form>
    </div>
    <div class="container2">
    <h3 class="label3"> Join Steam and discover thousands of games you can play. </h3>
        <img class="img" src="https://store.cloudflare.steamstatic.com/public/shared/images/login/join_pc.png?v=1">
        <h3 class="label4"> Easy to use and free to join.  </h3>
       <a class="goregister"  href="{{route('register')}}">Join Steam </a>
    </div>
    </div>
@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
@endsection
