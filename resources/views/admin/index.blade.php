@extends('front.front')

@section('title')
    Home
@endsection
@section('Content')
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

                  @endif
            @endforeach

        </div>
    </div>

@endforeach
@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/Usepost.css') }}">
@endsection

