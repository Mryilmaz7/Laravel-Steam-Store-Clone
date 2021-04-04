@extends('front.front')

@section('title')
Market
@endsection
@section('Content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
        {{session('success')}}

    </div>
    @endif
    @foreach($items as $row)
        @if(($row->selling_user_id) != auth()->id())
        <div class="card" style="width: 18rem;">
            <img src="{{$row->image}}"  alt="" style="max-height: 320px" class="img-responsive">
            <div class="card-body">

                <a href="{{route('admin.userpagee',$row->selling_user_id)}}">{{\App\Models\User::select('name')->where('id',$row->selling_user_id)->value('name')}} </a>
                <h5 class="card-title">{{$row->name }}</h5>
                <p class="card-text"><i class="fas fa-lira-sign"></i>{{$row->howmuch}}</p>
                <a href="{{route('buyitem',$row->id)}}" class="addto btn btn-success " style="float: right">Buy</a>
            </div>
        </div>
        @endif
   @endforeach
@endsection
@section('cs')

@endsection
