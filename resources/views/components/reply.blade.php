<reply inline-template :attributes="{{ $reply }}">
    <div class="px-6 pt-6 pb-2 bg-white rounded-lg shadow flex" id="reply-{{ $reply->id }}">
        <div class="mr-7 w-10">
            <img src="https://avatars.githubusercontent.com/u/463230?v=4" alt="Author avatar" class="rounded-full">
        </div>

        <div class="w-full">
            <div class="text-sm text-gray-400 mb-2 flex justify-between">
                <div>
                    <h4>
                        <a href="#" class="font-bold text-gray-700">{{ $reply->owner->name }}</a>
                        replied
                    </h4>
                    <span class="text-xs block">{{ $reply->created_at->diffForHumans() }}</span>
                </div>

                <dropdown align="right">
                    <template v-slot:trigger>
                        <button
                            class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <x-dots-horisontal-icon />
                        </button>
                    </template>

                    @can('update', $reply)
                        <a href="#" class="text-sm block px-4 py-2 hover:bg-gray-100" @click.prevent="editing = !editing">
                            {{ __('Edit Reply') }}
                        </a>

                        <a href="#" class="text-sm block px-4 py-2 hover:bg-gray-100" @click.prevent="destroy">
                            {{ __('Delete Reply') }}
                        </a>
                    @endcan
                </dropdown>
            </div>

            <template v-if="updating">
                <p>Updating ...</p>
            </template>

            <template v-if="!editing && !updating">
                <p v-text="body"></p>
            </template>

            <template v-else-if="editing && !updating">
                <x-textarea class="w-full mb-3 mt-2" v-model="body"></x-textarea>
                <x-button @click="update">Update</x-button>
                <button class="ml-2 text-sm py-2" @click="editing = false">Cancel</button>
            </template>

            <div class="border-t border-gray-100 mt-4">
                <favorite :reply="{{ $reply }}"></favorite>
            </div>
        </div>
    </div>
</reply>
