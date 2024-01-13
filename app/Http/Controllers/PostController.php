<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;
use App\Models\Game;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.post')->with(['posts' => $post->get()]);
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
        public function create(Game $game)
    {
        return view('posts.post')->with(['games' => $games->get()]);
    }
    public function show(Post $post)
    {
        return view('posts.post')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function store(Request $request, Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    //
}
