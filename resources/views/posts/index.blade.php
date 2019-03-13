@extends('layouts.app')

@section('content')
  <table class="table" style="margin-top:20px;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created at </th>
      <th scope="col">Creator Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ date('d-m-Y', strtotime($post->created_at))}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td>
      <a class="btn btn-info" href="{!! route('posts.show',['post'=>$post->id])!!}" role="button">View</a>
      <a class="btn btn-light" href="{!! route('posts.edit',['post'=>$post->id])!!}" role="button">Edit</a>
      <form method="post" action="{!! route('posts.destroy',['post'=>$post->id])!!}">
        @method('DELETE')
        @csrf
      <input class="btn btn-dark" type="submit" onclick="return confirm('Are you sure?')" value="Delete"/>
      </form>
      </td>
    </tr>
    
    @endforeach

  </tbody>
</table>
<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
  {{ $posts->links() }}
@endsection