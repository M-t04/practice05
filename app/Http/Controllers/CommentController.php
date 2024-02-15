<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    
    // コメントの保存
    public function store(CommentRequest $request, Comment $comment)
    {
        $input = $request['comment'];
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->fill($input)->save();
        
        return back();
    }
    
    // コメント編集画面表示
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with(['comment' => $comment]);
    }
    
    // コメントの編集を保存
    public function update(Request $request, Comment $comment)
    {
        $input_comment = $request['comment'];
        $comment->fill($input_comment)->save();
        
        return redirect('/posts/' .$comment->post_id);
    }
    
    // コメントの削除
    public function delete(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
