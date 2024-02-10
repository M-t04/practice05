    <x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>
<!--投稿一覧-->
        <h1 class="font-bold text-4xl">トップページ</h1>
        <div>
            <a href="/users">ユーザー検索</a>
        </div>
        <div class='games'>
            <a class="create" href="/games">ゲーム一覧を見る</a>
        </div>
            <a href="/posts/create">新規投稿作成</a>
        <div class='posts'>
            @foreach($posts as $post)
                <a class="username" href="/user_posts/{{ $post->user_id }}">{{ $post->user->name }}</a>
                <div class='post'>
                    <p class='game'>
                        <a href="/game_posts/{{ $post->game_id }}">{{ $post->game->title }}</a>
                    </p>
                    <p class='body'>{{ $post->body }}</p>
                </div>
        <!--詳細を見る-->
                <h5>
                   <a href="/posts/{{ $post->id }}">コメントを見る</a>
                </h5>
        <!--DELETEボタン-->
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="button" onclick="deletePost({{ $post->id }})">削除する</button>
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
   </x-app-layout>