<x-master>
    <div class="container mx-auto flex justify-center">
        <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-2xl">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('Confirm Password') }}</div>

                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="password">Password</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               name="password"
                               id="password"
                               value="{{old('password')}}"
                               placeholder="Enter your password"
                               autocomplete="current-password"
                        />
                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">{{ __('Send Password Reset Link') }}
                        </button>
                        <a href="{{route('password.request')}}" class="text-sm text-gray-700">Forgot Your Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>
