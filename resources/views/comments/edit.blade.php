<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-semibold mb-4">コメント編集画面</h1>
                <form action="{{ route('comment.update', $comment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="body" class="block text-sm font-medium text-gray-700">コメント</label>
                        <textarea id="body" name="comment[body]" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $comment->body }}</textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">保存</button>
                    </div>
                </form>
                <a href="/posts/{{ $comment->post_id }}" class="mt-4 text-indigo-600 hover:underline">戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
