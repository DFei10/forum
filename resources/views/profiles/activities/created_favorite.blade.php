<x-activity>
    <x-slot name="heading">
        <img src="https://avatars.githubusercontent.com/u/463230?v=4" alt="Author avatar" class="w-7 rounded-full">
        <div class="text-gray-700 ml-3">
            <a class="font-bold" href="#">{{ $user->name }}</a>
            favorited  a <a href="{{ $activity->subject->favorited->path() }}" class="font-bold">reply</a>.
        </div>
    </x-slot>

    <x-slot name="body">
        <p>{{ $activity->subject->favorited->body }}</p>
    </x-slot>
</x-activity>

