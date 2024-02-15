<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <h1 class="font-bold text-4xl text-center my-4">トップページ</h1>
    <div class="flex justify-center mb-4">
        <a href="/users" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ユーザー検索</a>
    </div>
    <div class='games flex justify-center mb-4'>
        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="/games">ゲーム一覧を見る</a>
    </div>
    <div class="flex justify-center mb-4">
        <a href="/posts/create" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">新規投稿作成</a>
    </div>
    <div class='posts max-w-4xl mx-auto my-8'>
        @foreach($posts as $post)
            <a class="username text-blue-500 hover:underline" href="/user_posts/{{ $post->user_id }}">{{ $post->user->name }}</a>
            <div class='post border border-gray-300 p-4 rounded-lg my-4'>
                <p class='game text-lg font-bold mb-2'>
                    <a href="/game_posts/{{ $post->game_id }}" class="text-green-500 hover:underline">{{ $post->game->title }}</a>
                </p>
                <p class='body bg-gray-100 p-4 rounded-md text-xl font-semibold'>{{ $post->body }}</p>
            </div>
            <!-- いいねボタン -->
                <div class="mt-4">
                    <!--Postに紐づくいいねをひとつずつ確認する-->
                    @if($post->isfavoritedByUser(Auth::id()))
                        <a href="{{ route('unfavorite', $post) }}" class="text-blue-500 hover:underline">
                        <i class="fas fa-heart" style="color: red;"></i>
                        <span class="badge">{{ $post->favorites->count() }}</span>
                        </a>
                    @else
                        <a href="{{ route('favorite', $post) }}" class="text-blue-500 hover:underline">
                        <i class="far fa-heart" style="color: grey;"></i>
                        <span class="badge">{{ $post->favorites->count() }}</span>
                        </a>
                    @endif
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
