@extends('front.front')

@section('title')
    Home
@endsection
@section('Content')
    @guest()
        @else
    @foreach($product as $row)
        <div class="card" style="width: 18rem;">
        <img src="{{$row->image}}"  alt="" style="max-height: 320px" class="img">
        <div class="card-body">
            <a class="card-title" href="{{route('game',$row->id)}}">{{$row->name}}</a>
            <p class="card-text"><i class="fas fa-lira-sign"></i>{{$row->howmuch}}</p>
            <a href="{{route('cart',$row->id)}}" class="addto btn btn-primary " style="float: right">Add to bag</a>
            @foreach($library as $list)
                    @if((($list->product_id) == ($row->id)) && (($list->user_id) == auth()->id()))
                        <div class="alert alert-success" role="alert">
                            You have a game
                        </div>
                @else

                  @endif
            @endforeach

        </div>
    </div>

@endforeach
@endsection
@endguest
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/Usepost.css') }}">
@endsection

