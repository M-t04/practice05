<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Game;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。


class PostController extends Controller
{
    
    // 一覧表示
    public function index(Post $post)
    {
        // blade内で使う変数名'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
        // WithでPostテーブルのデータを渡している
        return view('posts.index')->with(['posts' => $post->get()]);
    }
    
    // 投稿作成画面表示
    // Game・UserはModel
    public function create(Game $game, User $user)
    {
        return view('posts.create')->with([
            'games' => $game->get(),
        ]);
    }
    
    // 投稿保存処理
    public function store(Request $request, Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        $input = $request['post'];
        $post->user_id = Auth::id();
        //$input['user_id'] = 1;
        
        // $postの中身を確認
        // dd($input);
        
        $post->fill($input)->save();
        // return redirect('/posts/' . $post->id);
        return redirect('/');
    }

    // 既存の投稿詳細画面を表示 
    public function show(Post $post, User $user)
    {
        $favorite=Favorite::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        return view('posts.show', compact('post', 'favorite'));
    }
    
    // 編集機能
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    // 編集の保存
    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' .$post->id);
    }
    
    // 投稿の削除
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    // いいねをつける
    public function favorite(Post $post, Request $request){
        $favorite=New Favorite();
        $favorite->post_id=$post->id;
        $favorite->user_id=Auth::user()->id;
        $favorite->timestamps = false;
        $favorite->save();
        return back();

    }
    
    // いいねを外す
    public function unfavorite(Post $post, Request $request){
        $user=Auth::user()->id;
        $favorite=Favorite::where('post_id', $post->id)->where('user_id', $user)->first();
        $favorite->delete();
        return back();
    }
}