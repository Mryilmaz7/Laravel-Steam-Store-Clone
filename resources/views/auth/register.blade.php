@extends('front.loginfront')

@section('title')
Register

@endsection
@section('Content')
    @if(session('error'))<div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif
    @if(session('success'))<div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="containers">
        <div class="container">
<form class="form" method="POST" action="{{route('register')}}">
    @csrf
    <br>
    <label class="about">CREATE YOUR ACCOUNT</label><br>
    <label class="label one">Write your full name</label>
    <input class="input"  type="text" name="name" ><br><br>
    <label class="label two">Write your e-mail </label>
    <input class="input" type="email" name="email" ><br><br>
    <label class="label three">Write your e-mail again</label>
    <input class="input"  type="email" name="email_confirmation" ><br><br>
    <label class="label four">Write your password</label>
    <input class="input" type="password" name="password" ><br><br>
    <label class="label five">Write your password again</label>
    <input class="input"  type="password" name="password_confirmation" ><br><br>
    <button class="submit" type="submit"> REGISTER</button>
</form>
    </div>
    </div>
@endsection
@section('cs')
<link rel="stylesheet" href="{{ asset('asset/css/register.css') }}">
@endsection
