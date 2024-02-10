    <x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>
<!--ゲームごとの詳細ページ-->
       <div class='games'>
           <div class='post'>
               <p>{{ $game->title }}</p>
           </div>
           <p>{{ $game->description }}</p>
       </div>
       <a href="/games">ゲーム一覧に戻る</a>
   </x-app-layout>