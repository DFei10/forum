<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16 ">
            {{-- Navbar Left Side --}}
            <div class="flex">
                {{-- Logo --}}
                <div class="flex items-center">
                    <a href="#" class="font-semibold text-xl text-gray-700">Forum</a>
                </div>

                {{-- Navbar Links --}}
                <div class="ml-10 flex space-x-8">
                    <x-nav-link href="/threads" :active="request()->path() == 'threads'">All Threads</x-nav-link>
                </div>
            </div>

            {{-- Navbar Right Side --}}
            <div class="flex space-x-3">
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="inline-flex items-center text-gray-600 hover:text-gray-700">Login</a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center text-gray-600  hover:text-gray-700">Register</a>
                    @endif
                @endguest

                @auth
                    <div class="flex items-center">
                        {{-- Dropdown --}}
                        <dropdown align="right">
                            <template v-slot:trigger>
                                <button class="text-gray-600 flex items-center hover:text-gray-900 transition">
                                    <div>
                                        {{ auth()->user()->name }}
                                    </div>
                                    <div class="ml-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </button>
                            </template>

                            <a href="/threads/create" class="block px-4 py-2 hover:bg-gray-100 text-sm">Create Thread</a>
                            <a href="/profiles/{{ auth()->user()->name }}" class="block px-4 py-2 hover:bg-gray-100 text-sm">My Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 text-sm" onclick="event.preventDefault(); this.closest('form').submit();" class="text-sm">Log out</a>
                            </form>
                        </dropdown>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
