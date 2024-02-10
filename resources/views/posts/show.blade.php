    <x-app-layout>
        <x-slot name="header">
            詳細画面
        </x-slot>
        <h2>{{ Auth::user()->name }}</h2>
            <div class="post">
               <p class='game'>
                    <a href="/game_posts/{{ $post->game_id }}">{{ $post->game->title }}</a>
                </p>
                <p> {{ $post->body }}</p>
            </div>
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">編集</a>
        </div>
        <!--いいねボタン-->
            <span>
               @if($favorite)
                <a href="{{ route('unfavorite', $post) }}" class="unfavorite">
                    いいね
                    <span class="badge">
                         {{ $post->favorites->count() }}
                    </span>
                </a>
                @else
                <a href="{{ route('favorite', $post) }}" class="favorite">
                    いいね
                    <span class="badge">
                        {{ $post->favorites->count() }}
                    </span>  
                </a>
                @endif
            </span>
            
        <!--コメントを表示する-->
        <div>
        @if ($post->comments->count())
        <span>{{ $post->comments->count() }}件のコメント</span>
        @else
        <span>コメントはまだありません</span>
        @endif
        </div>
        @foreach ($post->comments as $comment)
            <div class="content_post">
                <p>{{ $comment->user->name }}</p>
                <div class="comment_body">
                    {{ $comment->body }}
                </div>
            </div>
            <div class="edit">
            <a href="/comments/{{ $comment->id }}/edit">コメントを編集する</a>
            </div>
        <!--ここまでコメント表示-->
        
        <!--DELETEボタン-->
            <form action="{{ route('comment.delete', $comment->id) }}" id="form_{{ $comment->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteComment({{ $comment->id }})">コメントを削除する</button>
            </form>
        @endforeach
                <script>
                   function deleteComment(id) {
                       'use strict'
                       if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                           document.getElementById(`form_${id}`).submit();
                       }
                   }
               </script>
        <!--ここまでDELETEボタン-->
            
        <!--コメント欄を追加する-->
            <div>
                <form method="post" action="{{ route('comment.store') }}">
                    @csrf
                    <input type="hidden" name='post_id' value="{{ $post->id }}">
                    <div>
                        <textarea class="textarea" name="body" id="body" placeholder="コメントを入力する">{{old('body')}}</textarea>
                    </div>
                    <div>
                    <button>コメントする</button>
                    </div>
                </form>
            </div>
        <!--コメント追加はここまで-->
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </x-app-layout>