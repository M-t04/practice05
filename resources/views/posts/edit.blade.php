<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-4">編集画面</h1>
                    <form action="/posts/{{ $post->id }}" method="POST" class="bg-white rounded-lg shadow-md p-4">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                            <textarea class="w-full border rounded-md p-2" name="post[body]" placeholder='入力スペース'>{{ $post->body }}</textarea>
                        </div>
                        <input type="submit" value="保存" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <div class="mt-4">
                            <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
