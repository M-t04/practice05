<x-app-layout>
    <!--各ゲームごとの投稿一覧表示-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-2xl font-semibold mb-4">ゲーム投稿一覧</h1>
            <div class="space-y-4">
                @foreach($posts as $post)
                <div class="border border-gray-200 rounded p-4">
                    <h2 class="text-lg font-semibold mb-2">{{ $post->user->name }}</h2>
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
                    <div class="mt-2">
                        <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">詳細を見る</a>
                    </div>
                    <!--削除ボタン-->
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})" class="text-red-500 hover:underline">削除</button>
                    </form>
                </div>
                @endforeach
            </div>
            <!--トップページ戻る-->
            <div class="footer mt-4">
                <a href="/" class="text-blue-500 hover:underline">戻る</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
