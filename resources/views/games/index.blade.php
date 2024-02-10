<x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>
 <!--ゲームの一覧表示-->
        <h1>ゲーム一覧</h1>
        <div>
            <form action="{{ route('games.index') }}" method="GET">
                <!--route 'games.index' は名前付きルート-->
                @csrf
                <!--キーワード検索-->
                <input type="text" name="keyword" value="{{ request('keyword') }}">
                <!--カテゴリー検索-->
                <select class='form' id="category" name="category">
                    @foreach($categories as $category)
                        <!--old（‘name属性の設定名’,データベース（テーブル）から取得した値）-->
                        <!--＠if （条件式）selected ＠endif-->
                        <option value="{{ ($category->id) }}"@if(request('category') == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                <!--検索ボタン-->
                <input type="submit" value="検索">
            </form>
        </div>
       <div class='games'>
           @foreach($games as $game)
           <div class='game'>
               <!--ゲームタイトルを押すとゲーム投稿一覧画面に飛ぶ-->
               <p class='game'>
                    {{ $game->title }}
                </p>
                <p class='description'>
                    {{ $game->description }}
                </p>
                    <a href="/games/{{ $game->id }}">詳細を見る</a>
                <!--ゲームに紐づけられているカテゴリーIDから各ゲームのカテゴリー名を表示-->
                <p class='category'>
                    <h2>{{ $game->category->name }}</h2>
                    <!--$game->category->nameのcategoryはModelsの関数-->
                </p>
           </div>
           @endforeach
       </div>
       <!--トップページ戻る-->
        <div class="footer">
            <a href="/">戻る</a>
        </div>
   </x-app-layout>