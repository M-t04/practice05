    <x-app-layout>
        <x-slot name="header">
            編集画面
        </x-slot>
        <h1>編集画面</h1>
            <div class='content'>
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class='content_body'>
                        <h2>{{ Auth::user()->name }}</h2>
                        <textarea class="textarea" name="post[body]" placeholder='入力スペース'>{{ $post->body }}</textarea>
                    </div>
                    <input type="submit" value="保存">
                </form>
                <a href="/posts/{{ $post->id }}">戻る</a>
            </div>
    </x-app-layout>