    <x-app-layout>
        <x-slot name="header">
            新規投稿作成
        </x-slot>
   <body>
       <form action='/posts' method="POST">
            @csrf
            <div class='game'>
                <h2>ゲーム選択</h2>
                <select name='post[game_id]'>
                    @foreach($games as $game)
                        <!--$gamesにはameの全件データが入っているので、こちらを1件ずつ表示しています。-->
                        <option value="{{ $game->id }}">{{ $game->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class='body'>
                <p>説明</p>
                <textarea class="textarea" name="post[body]" placeholder='入力スペース'></textarea>
            </div>
            <input type="submit" value="投稿する" />
            <div class="footer">
                <a href="/">戻る</a>
            </div>
       </form>
    </x-app-layout>