<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function store(Post $post,Request $request){
        // dd($request);
        $validated=$request->validate([
            'body'=>'required'
        ]);
        Comment::create([
            'user_id'=>Auth::user()->id,
            'post_id'=>$post->id,
            'body'=>$request->body
        ]);
        return back()->with('success','your comment has been added');

    }
}
