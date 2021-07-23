<x-app>
	<div class="py-8">
	    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
	        <div class="flex py-4 mb-6 justify-between items-center">
	            <div class="flex space-x-6">
	                <dropdown width="32">
	                	<template v-slot:trigger>
	                		<button class="text-gray-600 flex items-center hover:text-gray-900 transition font-semibold">
			                    <div>
			                    	Channels
			                    </div>
			                    <div class="ml-1">
			                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
			                    </div>
			                </button>
	                	</template>

	                	@foreach ($channels as $channel)
		                	<a href="/threads/{{ $channel->slug }}" class="block px-4 py-2 hover:bg-gray-100">
		                		{{ $channel->name }}
		                	</a>
                        @endforeach
	                </dropdown>
	                @auth
	                    <a href="/threads?by={{ auth()->user()->name }}" class="font-semibold block text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">My Threads</a>
	                @endauth

	                <a href="/threads?popular=1" class="font-semibold block text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">Popular Threads</a>
	            </div>

	            <a href="/threads/create" class="text-sm font-bold text-indigo-700 border-indigo-700 border-2 rounded-lg py-2 px-4 hover:bg-indigo-700 hover:text-white focus:ring focus:ring-indigo-200 transition duration-200 ease-in-out">New Thread</a>
	        </div>

	        <div>
	            @foreach ($threads as $thread)
	                <div class="p-6 bg-white rounded-lg mb-7 shadow flex">
	                    <div class="mr-7">
	                        <img
	                            src="https://pbs.twimg.com/profile_images/914894066072113152/pWD-GUwG_400x400.jpg"
	                            alt="Author avatar"
	                            class="w-10 rounded-full"
	                        >
	                    </div>
	                    <div class="w-full">
	                        <h4 class="text-xl font-semibold">
	                            <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
	                        </h4>

	                        <p class="mt-2">{{ $thread->body }}</p>
	                        <div class="border-b-2 border-gray-50 my-5"></div>
	                        <div class="flex justify-between items-center text-gray-400 text-sm">
	                            <div>
	                                Posted By <a href="/threads?by={{ $thread->author->name }}" class="text-indigo-700">{{ $thread->author->name }}</a>
	                                <span class="ml-6">{{ $thread->created_at->diffForHumans() }}</span>
	                            </div>

	                            <div class="flex items-center">
	                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
	                                <span>{{ $thread->replies_count }}</span>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            @endforeach
	        </div>
	    </div>
	</div>
</x-app>
