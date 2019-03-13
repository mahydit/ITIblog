@extends('layouts.app')

@section('content')

  <div class="card">
    <h5 class="card-header">Post Information</h5>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->description}}</p>
    </div>
  </div>

  <div class="card" style="margin-top:20px;margin-bottom:20px;">
    <h5 class="card-header">Creator Information</h5>
    <div class="card-body">
      <h5 class="card-title">Name: {{$user->name}}</h5>
      <h5 class="card-title">Email: {{$user->email}}</h5>
      <h5 class="card-title">Created at: {{$user->created_at}}</h5>
    </div>
  </div>
  <a href="{{route('posts.index')}}" class="btn btn-danger">Back</a>

@endsection