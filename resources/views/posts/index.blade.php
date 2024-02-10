<x-app-layout>
    <h1 class="font-bold text-4xl text-center my-4">トップページ</h1>
    <div class="flex justify-center">
        <a href="/users" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ユーザー検索</a>
    </div>
    <div class='games flex justify-center my-4'>
        <a class="create bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="/games">ゲーム一覧を見る</a>
    </div>
    <div class="flex justify-center">
        <a href="/posts/create" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">新規投稿作成</a>
    </div>
    <div class='posts max-w-4xl mx-auto my-8'>
        @foreach($posts as $post)
            <a class="username text-blue-500 hover:underline" href="/user_posts/{{ $post->user_id }}">{{ $post->user->name }}</a>
            <div class='post border border-gray-300 p-4 rounded-lg my-4'>
                <p class='game text-lg font-bold'>
                    <a href="/game_posts/{{ $post->game_id }}" class="text-green-500 hover:underline">{{ $post->game->title }}</a>
                </p>
                <p class='body'>{{ $post->body }}</p>
            </div>
    <!--詳細を見る-->
            <h5 class="text-right">
               <a href="/posts/{{ $post->id }}" class="text-yellow-500 hover:underline">コメントを見る</a>
            </h5>
    <!--DELETEボタン-->
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="text-right">
                @csrf
                @method('DELETE')
                <button class="delete bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="deletePost({{ $post->id }})">削除する</button>
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
