@extends('front.front')

@section('title')
Add POST
@endsection
@section('Content')
    <form class="newpost" action="" method="POST">
        @csrf
            <div class="addpost">
        <label class="title"> Add New Post</label><br>
        <label class="label"> New Post Title</label><br>
    <input type="text" class="titleform" name="title" placeholder="POST TITLE"><br><br>
        <label class="label"> New Post Content</label><br>
<textarea type="text" class="contentform" name="content" placeholder="POST CONTENT"></textarea><br>
                <label class="label">
                    <input name="status" type="checkbox" >Status
                </label>
    </div>
        <button class="postsub" type="submit"  >ADD POST</button>
    </form>

@endsection
@section('cs')
    <link rel="stylesheet" href="{{ asset('asset/css/addpost.css') }}">
@endsection
