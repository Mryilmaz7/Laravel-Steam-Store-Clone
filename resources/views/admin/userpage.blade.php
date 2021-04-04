
@extends('front.front')

@section('title')
UserPage
@endsection

@section('Content')
    <div class="userpageleft">
        <a class="name">{{$user->name}}</a>
    </div>
    <div class="userpageright">
        @foreach($posts as $row)
            <div class="titlecon">
                <label class="usetitle">{{$row->title}}</label>
            </div>
            <div class="contentcon">
                <textbox class="usecontent">{{$row->content}}</textbox>
            </div><br>
        @endforeach
    </div>
@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/userpage.css') }}">
@endsection
