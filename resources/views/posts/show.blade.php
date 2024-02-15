<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">{{ Auth::user()->name }}</h2>
                    <div class="post">
                        <p class='game text-lg font-bold mb-2'>
                            <a href="/game_posts/{{ $post->game_id }}" class="text-green-500 hover:underline">{{ $post->game->title }}</a>
                        </p>
                        <p class="text-gray-700">{{ $post->body }}</p>
                    </div>
                    <div class="edit mt-4">
                        <a href="/posts/{{ $post->id }}/edit" class="text-blue-500 hover:underline">編集</a>
                    </div>
                    
                    <!-- いいねボタン -->
                    <div class="mt-4">
                        <!--$favoriteに値が存在したら'unfavorite'を実行する-->
                        @if($favorite)
                            <a href="{{ route('unfavorite', $post) }}" class="text-blue-500 hover:underline">
                                <i class="fas fa-heart text-red-500"></i>
                                <span class="badge">{{ $post->favorites->count() }}</span>
                            </a>
                        <!--$favoriteに値が存在しなければ'favorite'を実行する-->
                        @else
                            <a href="{{ route('favorite', $post) }}" class="text-blue-500 hover:underline">
                                <i class="far fa-heart" style="color: grey;"></i>
                                <span class="badge">{{ $post->favorites->count() }}</span>
                            </a>
                        @endif
                    </div>
                    
                    <!-- コメントを表示する -->
                    <div class="mt-4">
                        @if ($post->comments->count())
                            <span>{{ $post->comments->count() }}件のコメント</span>
                        @else
                            <span>コメントはまだありません</span>
                        @endif
                    </div>
                    @foreach ($post->comments as $comment)
                        <div class="content_post mt-4 border-t border-gray-200">
                            <p class="font-semibold">{{ $comment->user->name }}</p>
                            <div class="comment_body text-gray-700">{{ $comment->body }}</div>
                        </div>
                        <div class="edit mt-2">
                            <a href="/comments/{{ $comment->id }}/edit" class="text-blue-500 hover:underline">コメントを編集する</a>
                        </div>
                        <!-- DELETEボタン -->
                        <form action="{{ route('comment.delete', $comment->id) }}" id="form_{{ $comment->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteComment({{ $comment->id }})" class="text-red-500 hover:underline">
                                削除
                            </button>
                        </form>
                        <!-- ここまでDELETEボタン -->
                    @endforeach

                    <!-- コメント欄を追加する -->
                    <div class="mt-4">
                        <form method="post" action="{{ route('comment.store') }}">
                            @csrf
                            <input type="hidden" name='post_id' value="{{ $post->id }}">
                            <div>
                                <textarea class="textarea" name="body" id="body" placeholder="コメントを入力する">{{ old('body') }}</textarea>
                            </div>
                            <div>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    コメントする
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- コメント追加はここまで -->

                    <div class="footer mt-4">
                        <a href="/" class="text-blue-500 hover:underline">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
