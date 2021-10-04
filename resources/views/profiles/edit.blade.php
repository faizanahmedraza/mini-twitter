<x-app>
    <form method="POST" action="{{$user->profilePath('update')}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   value="{{old('name',$user->name)}}"
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
                   value="{{old('username',$user->username)}}"
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
                   value="{{old('email',$user->email)}}"
                   placeholder="Enter your email"/>

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">Avatar</label>
            <div class="flex">
                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="avatar"
                       id="avatar"/>
                <img src="{{$user->avatar}}"
                     alt="your avatar"
                     width="48"/>
            </div>
            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avatar">Banner</label>
            <div class="flex">
                <input class="border border-gray-400 p-2 w-full"
                       type="file"
                       name="banner"
                       id="banner"/>
            </div>
            <img class="block w-full h-2/4 rounded-2xl mt-2" src="{{$user->banner}}"
                 alt="your banner"
                 width=""/>
            @error('banner')
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
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="about">About YourSelf</label>
            <textarea class="border border-gray-400 p-2 w-full"
                      name="about"
                      id="about"
                      rows="5"
                      placeholder="Enter your self description">{{old('about',$user->about)}}</textarea>

            @error('about')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="px-5 py-2 bg-blue-500 text-sm text-white rounded-sm mr-4">Submit</button>
            <a href="{{$user->profilePath()}}">Cancel</a>
        </div>
    </form>
</x-app>