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
                    <a href="#" class="inline-flex items-center text-gray-600 border-b-2 border-transparent hover:border-gray-300">All Threads</a>
                    <a href="#" class="inline-flex items-center text-gray-600 border-b-2 border-transparent hover:border-gray-300">New Threads</a>
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
                                Dropdown
                            </template>

                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Profile</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">New Thread</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Log out</a>
                        </dropdown>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>