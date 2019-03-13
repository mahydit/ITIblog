@extends('layouts.app')

@section('content')

<!-- TODO: show post creator with specific date formate -->
<div class="jumbotron">
  <h1 class="display-4">{{$post->title}}</h1>
  <hr class="my-4">
  <p>{{$post->description}}</p>
  <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>
</div>

@endsection