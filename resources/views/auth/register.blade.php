<x-guest>
    <div class="flex items-center justify-center min-h-screen">
        <div class="rounded-lg bg-white px-6 py-4 shadow max-w-md w-full">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label for="name"
                        class="block text-sm text-gray-700">{{ __('Name') }}</label>

                    <input id="name" type="text"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring mt-1" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="text-red-500 font-light text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="email"
                        class="block text-sm text-gray-700">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring mt-1" name="email"
                        value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="text-red-500 font-light text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password"
                        class="block text-sm text-gray-700">{{ __('Password') }}</label>

                    <input id="password" type="password"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring mt-1" name="password"
                        required autocomplete="new-password">

                    @error('password')
                        <span class="text-red-500 font-light text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password-confirm"
                        class="block text-sm text-gray-700">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring mt-1"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mt-4 flex justify-end items-center">
                    @if (Route::has('login'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    @endif

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest>

