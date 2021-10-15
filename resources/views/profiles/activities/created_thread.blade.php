<x-activity>
    <x-slot name="heading">
        <img src="https://avatars.githubusercontent.com/u/463230?v=4" alt="Author avatar" class="w-7 rounded-full">
        <div class="text-gray-700 ml-3">
            <a class="font-bold" href="#">{{ $user->name }}</a>
            published a <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
        </div>
    </x-slot>

    <x-slot name="body">
        <p>{{ $activity->subject->body }}</p>
    </x-slot>
</x-activity>
