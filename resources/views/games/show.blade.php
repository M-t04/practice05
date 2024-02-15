<x-app-layout>
    <!--ゲームごとの詳細ページ-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                <h1 class="text-2xl font-semibold mb-4">{{ $game->title }}</h1>
                <p class="text-gray-600">{{ $game->description }}</p>
            </div>
            <a href="/games" class="text-blue-500 hover:underline mt-4">ゲーム一覧に戻る</a>
        </div>
    </div>
</x-app-layout>
