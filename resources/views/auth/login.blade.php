<x-guest>
    <div class="flex items-center justify-center min-h-screen">
        <div class="rounded-lg bg-white px-6 py-4 shadow max-w-md w-full">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email"
                        class="block text-sm text-gray-700">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring mt-1"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="text-xs font-light text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mt-4">
                    <label for="password" class="block text-sm text-gray-700">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 focus:ring mt-1" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="text-xs font-light text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 flex items-center">
                    <input class="border-gray-300 rounded shadow text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="text-sm text-gray-600 ml-2" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="mt-4 flex justify-end items-center">
                    <div class="col-md-8 offset-md-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest>
