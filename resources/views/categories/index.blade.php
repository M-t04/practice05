<x-app-layout>
    <x-slot name="header">
        Index
    </x-slot>
    <!--選択されたカテゴリーのゲーム一覧を表示する-->
        @foreach($games as $game)
            <div class='games'>
            <p class='category'>{{ $games->category->name }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
