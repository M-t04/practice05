<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-6 border-b border-gray-200">
                <!--ゲームの一覧表示-->
                <h1 class="text-2xl font-semibold mb-4">ゲーム一覧</h1>
                <div class="mb-4">
                    <!--route 'games.index' は名前付きルート-->
                    <form action="{{ route('games.index') }}" method="GET">
                        @csrf
                        <!--キーワード検索-->
                        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワード検索">
                        
                        <!--カテゴリー検索-->
                        <select name="category" value="{{ $categories }}" class="ml-2">
                            <option value="">未選択</option>
                            @foreach($categories as $category)
                                <!--old（‘name属性の設定名’,データベース（テーブル）から取得した値）-->
                                <!--＠if （条件式）selected ＠endif-->
                                <option value="{{ $category->id }}" @if(request('category') == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <!--検索ボタン-->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md ml-2">検索</button>
                    </form>
                </div>
                <div class="space-y-4">
                    @if($games->isEmpty())
                        <p class="text-center">検索結果がありません</p>
                    @else
                        @foreach($games as $game)
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <!--ゲームタイトルを押すとゲーム投稿一覧画面に飛ぶ-->
                                <p class="text-xl font-semibold text-gray-800">{{ $game->title }}</p>
                                <p class="text-gray-500">{{ $game->description }}</p>
                                <a href="/games/{{ $game->id }}" class="text-blue-500 hover:underline">詳細を見る</a>
                                <p class="category mt-2">
                                    <!--ゲームに紐づけられているカテゴリーIDから各ゲームのカテゴリー名を表示-->
                                    <span class="text-gray-600">{{ $game->category->name }}</span>
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="mt-4">
                    <!--トップページ戻る-->
                    <a href="/" class="text-blue-500 hover:underline">トップページに戻る</a>
                </div>
            </div>
        </div>
</x-app-layout>
