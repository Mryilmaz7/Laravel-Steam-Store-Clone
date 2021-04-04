@extends('front.front')

@section('title')
My Library
@endsection
@section('Content')
    @foreach($libraryy as $row)
        <div class="card" style="width: 18rem;">
            <img src="{{$row->image}}"  alt="" style="max-height: 320px" class="img-responsive">
            <div class="card-body">
                <h5 class="card-title">{{$row->name}}</h5>

            </div>
        </div>
    @endforeach
@endsection
@section('cs')

@endsection
