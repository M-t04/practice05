    <x-app-layout>
        <x-slot name="header">
            Index
        </x-slot>
        <div>
          <a href="/users/list">自分のつながりを見る</a>
            <h2>ユーザー検索</h2>
            <div>
              <form action="{{ route('users.index') }}" method="GET">
                <input type="text" name="keyword" value="{{ request('keyword') }}">
                <input type="submit" value="検索">
              </form>
            </div>
          <table border="1">
            <tr>
              <th>ID</th>
              <th>名前</th>
              <th>関係性</th>
              <th>フォローボタン</th>
            </tr>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>
              <!--各if文の結果ごとの表示を返す-->
              @switch($user->relation())
                @case(0) <span>　</span> @break
                @case(1) <span>あなたがフォロー</span> @break
                @case(2) <span>あなたをフォロー</span> @break
                @case(3) <span>相互フォロー</span> @break
                @default <span>　</span>
              @endswitch
              <!--ここまで-->
            </td>
            <td>
              <form method="POST" action="{{ route('users.follow') }}">
                @csrf
                <input name="followed_user_id" type="hidden" value="{{ $user->id }}" />
                @if($user->isFollow())
                        <button type="submit">
                            フォロー解除
                        </button>
                    @else
                        <button type="submit">
                            フォローする
                        </button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
        </table>
        </div>
   </x-app-layout>