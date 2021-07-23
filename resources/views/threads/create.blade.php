<x-app>
	<div class="max-w-lg bg-white mx-auto mt-10 py-4 px-6 shadow rounded-lg">
        <form action="/threads" method="POST">
            @csrf

            <div class="space-y-3">
                <div>
                    <x-label for="channel_id" :value="__('Choose a Channel')" />
                    <x-select name="channel_id" id="channel_id" class="block mt-1 w-full">
                        <option value="" selected disabled>Choose a Channel</option>

                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}" {{ $channel->id == old('channel_id') ? 'selected' : '' }}>{{ $channel->name }}</option>
                        @endforeach
                    </x-select>

                    @error('channel_id')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <x-label for="title" :value="__('Title')" />
                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title') }}"/>

                    @error('title')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <div>
                    <x-label for="body" :value="__('Body')" />
                    <x-textarea id="body" name="body" class="block mt-1 w-full" rows="5">{{ old('body') }}</x-textarea>

                    @error('body')
                        <x-error-message>{{ $message }}</x-error-message>
                    @enderror
                </div>

                <x-button>Publish</x-button>
            </div>
        </form>
    </div>
</x-app>
