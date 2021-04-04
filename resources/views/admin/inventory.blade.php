@extends('front.front')

@section('title')
My Inventory
@endsection
@section('Content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @foreach($inventory as $row)
        @csrf
        <div class="card" style="width: 18rem;">
            <img src="{{$row->image}}"  alt="" style="max-height: 320px" class="img-responsive">
            <div class="card-body">
                <h5 class="card-title">{{$row->name}}</h5>
                <p class="card-text"><i class="fas fa-lira-sign"></i>{{$row->howmuch}}</p>
                <input  name="howmuch" placeholder="How Much">
                <a href="{{route('sold',$row->id)}}" class="addto btn btn-primary " style="float: right">Sell</a>
            </div>
        </div>
    @endforeach
@endsection
@section('css')

@endsection
