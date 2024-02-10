<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;

class GameController extends Controller
{
    
    public function index(Request $request, Game $game, Category $category)
    {
        // テーブルから全てのレコードを取得する
        $games = Game::query();
        $categories = Category::query();
        // キーワードから検索
        // $keywordはキーワードを代入した変数
        // $categoryは検索したいcategory
        $keyword = $request->input('keyword');
        $category = $request->input('category');

        // もしキーワードがあったら検索
        if(!empty($keyword)) {
            // 検索テーブル LIKE=キーワード部分一致　％＝前方か後方か一致
            $games->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('description' ,'LIKE', "%{$keyword}%");
            }
            
            // '='完全に一致しているもの
        if(!empty($category)) {
            $games->where('category_id', '=' ,$category);
            
        }
        
        // 検索結果をビューに渡す
        return view('games.index')->with([
            'games' => $games->get(),
            'categories' => $categories->get(),
        ]);
    }

    public function game_posts(Game $game)
    {
        return view('games.game_posts')->with(['posts' => $game->posts]);
    }
    
    public function show(Game $game)
    {
        return view('games.show')->with(['game' => $game]);
    }
}
