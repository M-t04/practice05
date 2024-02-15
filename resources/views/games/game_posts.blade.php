<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            <!--各ゲームごとの投稿一覧表示-->
            <h1 class="text-2xl font-semibold mb-4">ゲーム投稿一覧</h1>
                <div class="mb-4">
                <a href="/posts/create" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">新規投稿作成</a>
                </div>
            <div class="space-y-4">
                @foreach($posts as $post)
                        <a href="/user_posts/{{ $post->user_id }}" class="username text-blue-500 hover:underline">{{ $post->user->name }}</a>
                        <p class="text-base font-bold mb-2">
                            <!--ゲームタイトルを押すとゲーム投稿一覧画面に飛ぶ-->
                            <a href="" class="text-gray-500 hover:underline">{{ $post->game->title }}</a>
                        </p>
                        <!--ゲームに紐づけられているカテゴリーIDから各ゲームのカテゴリー名を表示-->
                        <p class="text-sm text-gray-500">{{ $post->game->category->name }}</p>
                        <!--投稿内容表示-->
                        <p class="body rounded-md text-xl font-semibold">{{ $post->body }}</p>
                        <h5 class="mt-2">
                            <!--showページへ飛ぶ-->
                            <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">詳細を見る</a>
                        </h5>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <!--削除ボタン-->
                            <button type="button" onclick="deletePost({{ $post->id }})" class="text-red-500 hover:underline">削除する</button>
                        </form>
                @endforeach
            </div>
            <div class="mt-4">
                <a href="/" class="text-blue-500 hover:underline">トップページに戻る</a>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
