<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts'=>Post::with('user')->paginate(2)
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'users' => User::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->all());

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all(),
            
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user'=>User::find($post->user_id),
        ]);
    }

    public function destroy($post)
    {
        Post::where('id', $post)->delete();
        return redirect()->route('posts.index');
    }

    public function update(UpdatePostRequest $request,$post)
    {
        Post::find($post)->update($request->all());
        return redirect()->route('posts.index');
    }
}
