<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        <h2 class="text-lg font-semibold mb-4">相互フォロー</h2>
        <div class="grid grid-cols-2 gap-4">
            @foreach($follow_eachs as $follow_each)
            <div class="border border-gray-300 p-4">
                <p class="font-semibold">{{ $follow_each->name }}</p>
                <p class="text-gray-600">{{ $follow_each->id }}</p>
            </div>
            @endforeach
        </div>

        <h2 class="text-lg font-semibold mt-8 mb-4">フォロー</h2>
        <div class="grid grid-cols-2 gap-4">
            @foreach($follows as $follow)
            <div class="border border-gray-300 p-4">
                <p class="font-semibold">{{ $follow->name }}</p>
                <p class="text-gray-600">{{ $follow->id }}</p>
            </div>
            @endforeach
        </div>

        <h2 class="text-lg font-semibold mt-8 mb-4">フォロワー</h2>
        <div class="grid grid-cols-2 gap-4">
            @foreach($followers as $follower)
            <div class="border border-gray-300 p-4">
                <p class="font-semibold">{{ $follower->name }}</p>
                <p class="text-gray-600">{{ $follower->id }}</p>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
