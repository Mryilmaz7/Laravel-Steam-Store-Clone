@extends('front.front')

@section('title')
Game
@endsection
@section('Content')
@foreach($games as $row)
<img class="images" src="{{$row->image}}">
<img class="images" src="{{$row->imagetwo}}">
<img class="images" src="{{$row->imagethree}}">
<h5 class="names">{{$row->name}}</h5>
<h5 class="howmuch"><i class="fas fa-lira-sign"></i>{{$row->howmuch}}</h5>

<h5 class="contentt">{{$row->content}}</h5>

@endforeach
<form class="newpost" action="" method="POST">
    @csrf
    <div class="addpost">
        <div class="d-flex flex-row align-items-start"><textarea class="form-control ml-1 shadow-none textarea" name="content" placeholder="What is your comment about the game?"></textarea></div>
    </div>
    <button class="addto btn btn-primary "  type="submit"  >ADD COMMENT</button>
</form>
@foreach($posts as $post)
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="d-flex flex-column comment-section">
                    <div class="bg-dark p-2">
                            <div class=" name d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{\App\Models\User::select('name')->where('id',$post->user_id)->value('name')}}</span></div>
                        <div class="brdr">
                            <p class="comment-text" class="brdr"> {{$post->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/game.css') }}">
@endsection
