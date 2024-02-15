<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Follow_user;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
        public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $users =  User::where('id','!=',Auth::user()->id);
        
        if(!empty($keyword)) {
            // 検索テーブル LIKE=キーワード部分一致　％＝前方か後方か一致
            $users
            ->where('name', 'LIKE', "%{$keyword}%");
            }
        $users = $users->get();
        
        return view('users.index', compact('users'));
        
    }
    
    public function follow(Request $request)
    {
        $followed_user_id = $request->followed_user_id;
        
        // ログインユーザーが対象のユーザーをフォローしているか？ 
        $isFollow = (boolean) Follow_user::where('following_user_id', Auth::user()->id)->where('followed_user_id', $followed_user_id)->first();
        
        if($isFollow){
            $unfollow = Follow_user::where('following_user_id', Auth::user()->id)->where('followed_user_id', $followed_user_id);
            $unfollow->delete();
        }else{
            $follow = new follow_user();
            $follow->following_user_id = Auth::user()->id;
            $follow->followed_user_id = $followed_user_id;
            $follow->timestamps = false;
            $follow->save();
    }

    return back();
    }
    
    public function list(){
        
        // ログインユーザーのフォローIDを$follow_idにArrayで格納
        $follow_id = Follow_user::where('following_user_id', Auth::user()->id)->pluck('followed_user_id')->toArray();
    
        // ログインユーザーフォロワーIDを$follower_idにArrayで格納
        $follower_id = Follow_user::where('followed_user_id', Auth::user()->id)->pluck('following_user_id')->toArray();
    
        // 相互フォローユーザーのIDを$follow_eachに格納
        $follow_each_id = array_intersect($follow_id, $follower_id);
    
        // 相互フォローユーザー
        $follow_eachs = User::whereIn('id', $follow_each_id)->get();
    
        // ログインユーザーのフォローしているユーザー(相互フォローユーザーを除く)
        $follows = User::whereIn('id',$follow_id)->whereNotIn('id',$follow_each_id)->get();
    
        // ログインユーザーをフォローしているユーザー(相互フォローユーザーを除く)
        $followers = User::whereIn('id',$follower_id)->whereNotIn('id',$follow_each_id)->get();
    
    
        return view('users.list', compact('follows','followers','follow_eachs'));
    }
    
        public function user_posts(User $user)
    {
        return view('users.user_posts')->with(['posts' => $user->posts]);
    }
    

}
    
