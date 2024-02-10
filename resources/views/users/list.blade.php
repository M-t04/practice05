<x-app-layout>
    <x-slot name="header">
        Index
    </x-slot>
    <div>
        <h3>相互フォロー</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>名前</th>
            </tr>
            
            @foreach($follow_eachs as $follow_each)
            <tr>
                <td>
                    {{ $follow_each->id }}
                </td>
                <td>
                    {{ $follow_each->name }}
                </td>
            </tr>
            @endforeach
        </table>
        
        <h3>あなたがフォローしているユーザー</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>名前</th>
            </tr>
            
            @foreach($follows as $follow)
            <tr>
                <td>
                    {{ $follow->id }}
                </td>
                <td>
                    {{ $follow->name }}
                </td>
            </tr>
            @endforeach
        </table>
        
        <h3>あなたをフォローしているユーザー</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>名前</th>
            </tr>
            
            @foreach($followers as $follower)
            <tr>
                <td>
                    {{ $follower->id }}
                </td>
                <td>
                    {{ $follower->name }}
                </td>
            </tr>
            @endforeach
        </table>
        
    </div>
</x-app-layout>