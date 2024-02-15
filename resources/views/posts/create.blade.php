<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <form action='/posts' method="POST" class="bg-white rounded-lg shadow-md p-4">
                        @csrf
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold">ゲーム選択</h2>
                            <select name='post[game_id]' class="w-full border rounded-md p-2 mt-2">
                                <!--$gamesにはameの全件データが入っているので、こちらを1件ずつ表示しています。-->
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 font-semibold mb-2" for="body">投稿作成</label>
                            <textarea class="w-full border rounded-md p-2" name="post[body]" id="body" placeholder='入力スペース'></textarea>
                        </div>
                        <input type="submit" value="投稿する" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <div class="mt-4">
                            <a href="/" class="text-blue-500 hover:underline">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
</x-app-layout>
