<x-master>
    <div class="container mx-auto h-screen flex justify-center items-center">
        <div class="px-12 py-8 bg-gray-200 border border-gray-300 rounded-2xl">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('Reset Password') }}</div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="email">{{ __('E-Mail Address') }}</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="email"
                               name="email"
                               id="email"
                               value="{{old('email')}}"
                               placeholder="Enter your email"
                               required autocomplete="email" autofocus/>

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               name="password"
                               id="password"
                               value="{{old('password')}}"
                               placeholder="Enter your password"/>
                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">Confirm
                            Password</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               value="{{old('password_confirmation')}}"
                               placeholder="Re Enter your password"/>

                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">{{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>
