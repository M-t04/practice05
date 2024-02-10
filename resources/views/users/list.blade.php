<x-app-layout>
    <div>
        <h2>相互フォロー</h2>
        <table border="1">
            <!--<tr>-->
            <!--    <th>ID</th>-->
            <!--    <th>名前</th>-->
            <!--</tr>-->
            
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
        
        <h2>フォロー</h2>
        <table border="1">
            <!--<tr>-->
            <!--    <th>ID</th>-->
            <!--    <th>名前</th>-->
            <!--</tr>-->
            
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
        
        <h2>フォロワー</h2>
        <table border="1">
            <!--<tr>-->
            <!--    <th>ID</th>-->
            <!--    <th>名前</th>-->
            <!--</tr>-->
            
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