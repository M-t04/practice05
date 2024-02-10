    <x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>
<!--各ゲームごとの投稿一覧表示-->
        <h1>ゲーム投稿一覧</h1>
       <a href="/posts/create">新規投稿作成</a>
       <div class='posts'>
           @foreach($posts as $post)
           <h2 class="username">{{ $post->user->name }}</h2>
           <div class='post'>
               <!--ゲームタイトルを押すとゲーム投稿一覧画面に飛ぶ-->
               <p class='game'>
                    <a href="">{{ $post->game->title }}</a>
                </p>
                <!--ゲームに紐づけられているカテゴリーIDから各ゲームのカテゴリー名を表示-->
                <p class='category'>
                    {{ $post->game->category->name }}
                </p>
                <!--投稿内容表示-->
               <p class='body'>{{ $post->body }}</p>
           </div>
           <!--showページへ飛ぶ-->
            <h5>
               <a href="/posts/{{ $post->id }}">詳細を見る</a>
            </h5>
            <!--削除ボタン-->
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
            </form>
           @endforeach
       </div>
       <script>
           function deletePost(id) {
               'use strict'
               
               if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                   document.getElementById(`form_${id}`).submit();
               }
           }
       </script>
       <!--トップページ戻る-->
        <div class="footer">
            <a href="/">戻る</a>
        </div>
   </x-app-layout>