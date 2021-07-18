@guest()
@extends('front.front')
@section('title')
    Welcome to my Steam
@endsection
@section('Content')

<div class="home">
    <h3 class="BoxName">FEATURES AND RECOMMENDED</h3>
    <ul class="box bxslider">
        @foreach($games as $row)
            <li class="notLimage" >
                <a href="{{route('game',$row->id)}}">
                </a>
                <div class="tek">
                    <div class="container1">

                <img  class="img"  src="{{$row->image}}"/>

                    </div>
                    <div class="container2">
                            <div class="containerimg">
                                <img class="img2"    src="{{$row->imagetwo}}">
                                <img  class="img3" src="{{$row->imagethree}}">
                        </div>

                        <h3 class="howmuch"> {{$row->howmuch}} <i class="fas fa-lira-sign"></i></h3>
                        <h3 class="cpu"> <i class="fab fa-windows"></i> </h3>
                        <h3 class="cpu"> <i class="fab fa-apple"></i> </h3>

                    </div>
                </div>
            </li>
        @endforeach
    </ul>




</div>

@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/notlogin.css') }}" >
@endsection

@else
@section('Content')

    <div class="home">
        <h3 class="BoxName">FEATURES AND RECOMMENDED</h3>
        <ul class="box bxslider">
            @foreach($games as $row)
                <li class="notLimage" >
                    <a href="{{route('game',$row->id)}}">
                    </a>
                    <div class="tek">
                        <div class="container1">

                            <img  class="img"  src="{{$row->image}}"/>

                        </div>
                        <div class="container2">
                            <div class="containerimg">
                                <img class="img2"    src="{{$row->imagetwo}}">
                                <img  class="img3" src="{{$row->imagethree}}">
                            </div>

                            <h3 class="howmuch"> {{$row->howmuch}} <i class="fas fa-lira-sign"></i></h3>
                            <h3 class="cpu"> <i class="fab fa-windows"></i> </h3>
                            <h3 class="cpu"> <i class="fab fa-apple"></i> </h3>

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/notlogin.css') }}" >
@endsection
@section('title')
@endsection


@endguest


