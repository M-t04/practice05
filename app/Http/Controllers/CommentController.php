<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    
    // コメントの保存
    public function store(CommentRequest $request)
    {
        $input = $request['comment'];
        
        $comment = Comment::create([
            'body' => $input['body'],
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id
        ]);
        
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
