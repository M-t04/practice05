<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
            <a href="/users/list" class="text-blue-500 mb-4 block">自分のつながりを見る</a>
            <h2 class="text-lg font-semibold mb-4">ユーザー検索</h2>
            <div class="mb-4">
                <form action="{{ route('users.index') }}" method="GET" class="flex items-center">
                    <input type="text" name="keyword" value="{{ request('keyword') }}" class="border border-gray-300 px-4 py-2 rounded-md mr-2">
                    <input type="submit" value="検索" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 cursor-pointer">
                </form>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">名前</th>
                            <th class="border border-gray-300 px-4 py-2">関係性</th>
                            <th class="border border-gray-300 px-4 py-2">フォローボタン</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($users->isEmpty())
                        <p class="text-center">検索結果がありません</p>
                    @else
                        @foreach($users as $user)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @switch($user->relation())
                                    @case(0) <span>　</span> @break
                                    @case(1) <span>あなたがフォロー</span> @break
                                    @case(2) <span>あなたをフォロー</span> @break
                                    @case(3) <span>相互フォロー</span> @break
                                    @default <span>　</span>
                                @endswitch
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form method="POST" action="{{ route('users.follow') }}">
                                    @csrf
                                    <input name="followed_user_id" type="hidden" value="{{ $user->id }}" />
                                    @if($user->isFollow())
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 cursor-pointer">
                                            フォロー解除
                                        </button>
                                    @else
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 cursor-pointer">
                                            フォローする
                                        </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
