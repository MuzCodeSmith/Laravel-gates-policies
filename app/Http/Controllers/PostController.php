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
        $posts = Post::get();

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

        return redirect()->route('user.posts.all',$id)->with('success', 'Post Created Successfully');

    }

    function edit($postId){
        $userWithPost = Post::with('user')->find($postId);
        if (!Gate::allows('edit-user-posts', $userWithPost)) {
            abort(403, 'Unauthorized access.');
        }
        return view('user.edit-post',compact('userWithPost'));
    }

    function update($postId,Request $request){
        // return $request;
        $post = Post::find($postId);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('user.posts.all',$post->user_id)->with('success', 'Post Updated Successfully');
    }

    function destroy($postId){
        $post=Post::find($postId);
        $status=$post->destroy($postId);
        return redirect()->route('user.posts.all',$post->user_id)->with('success', 'Post Deleted Successfully');
    }
}
