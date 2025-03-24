<?php

namespace App\Http\Controllers;

use App\Models\User\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function create(){
        return view('user.create-post');
    }

    function showAll($id){
        if (!Gate::allows('view-user-posts', $id)) {
            abort(403, 'Unauthorized access.');
        }
        $posts = Post::where('user_id', $id)->get();; 

        return view('user.list-posts',compact('posts'));
    }

    function store($id, Request $request){

        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $createdPost = Post :: create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>$id
        ]);

        return redirect()->route('utils.dashboard');

    }

    function edit($postId){
        $post = Post::where('id', $postId)->get();
       
        return view('user.edit-post',['userWithPost'=>$post]);
    }
}
