    <x-app-layout>
        <x-slot name="header">
            コメント編集画面
        </x-slot>
        <h1>コメント編集画面</h1>
            <div class='content'>
                <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='content_body'>
                        <h2>{{ Auth::user()->name }}</h2>
                        <textarea class="textarea" name="comment[body]" placeholder='入力スペース'>{{ $comment->body }}</textarea>
                    </div>
                    <input type="submit" value="保存">
                </form>
                <a href="/posts/{{ $comment->post_id }}">戻る</a>
            </div>
    </x-app-layout>