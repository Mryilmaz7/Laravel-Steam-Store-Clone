@extends('front.front')

@section('title')
Register

@endsection
@section('Content')

<form class="form" method="POST" action="{{route('register')}}">
    @csrf
    <br>
    <label class="about">This is a registration form.</label><br>
    <input class="input"  type="text" name="name" placeholder="NAME"><br><br>
    <input class="input" type="email" name="email" placeholder="EMAIL"><br><br>
    <input class="input"  type="email" name="email_confirmation" placeholder="EMAIL AGAIN"><br><br>
    <input class="input" type="password" name="password" placeholder="PASSWORD"><br><br>
    <input class="input"  type="password" name="password_confirmation" placeholder="PASSWORD AGAIN"><br><br>
    <button class="submit" type="submit"> SUBMIT</button>

</form>
@endsection
@section('cs')
<link rel="stylesheet" href="{{ asset('asset/css/register.css') }}">
@endsection
