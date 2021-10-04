<x-master>
    <div class="container mx-auto h-screen flex justify-center items-center">
        <div class="px-12 py-6 bg-gray-200 border border-gray-300 rounded-2xl">
            <div class="col-md-8">
                <div class="font-bold text-lg mb-4">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="name"
                               id="name"
                               value="{{old('name')}}"
                               placeholder="Enter your name"/>

                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">User Name</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="username"
                               id="username"
                               value="{{old('username')}}"
                               placeholder="Enter your username"/>

                        @error('username')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="email"
                               name="email"
                               id="email"
                               value="{{old('email')}}"
                               placeholder="Enter your email"/>

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
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">Submit
                        </button>
                        <a href="{{route('login')}}" class="text-sm text-gray-700">Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-master>
