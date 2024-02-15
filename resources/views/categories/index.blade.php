<x-app-layout>
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        @foreach($games as $game)
            <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                <p class="text-gray-600">{{ $game->category->name }}</p>
                <h2 class="text-xl font-semibold text-gray-800">{{ $game->title }}</h2>
                <p class="text-gray-500">{{ $game->description }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
