<div class="pl-5 flex justify-start lg:justify-end lg:fixed lg:overflow-y-auto">
    <ul>
        <li class="ml-2 pt-2">
            <div class="flex items-center">
                <img class="w-12 h-auto mr-2" src="{{asset('images/twitter_bird_logo.png')}}" alt="Tweety"/>
                <h1 class="text-2xl font-normal text-gray-600">Tweety</h1>
            </div>
        </li>
        <li class="ml-4 py-2">
            <div class="flex items-center">
                <i class="fal fa-home-lg-alt text-2xl fa-fw mr-4"></i>
                <a class="text-2xl font-normal text-gray-600" href="{{route('home')}}">Home</a>
            </div>
        </li>
        <li class="ml-4 py-2">
            <div class="flex items-center">
                <i class="fal fa-hashtag text-2xl fa-fw mr-4"></i>
                <a class="text-2xl font-normal text-gray-600" href="{{route('explore')}}">Explore</a>
            </div>
        </li>
        <li class="ml-4 py-2">
            <div class="flex items-center">
                <i class="fal fa-bell text-2xl fa-fw mr-4"></i>
                <a class="text-2xl font-normal text-gray-600" href="{{route('explore')}}">Notifications</a>
            </div>
        </li>
        <li class="ml-4 py-2">
            <div class="flex items-center">
                <i class="fal fa-envelope text-2xl fa-fw mr-4"></i>
                <a class="text-2xl font-normal text-gray-600" href="">Messages</a>
            </div>
        </li>
        <li class="ml-4 py-2">
            <div class="flex items-center">
                <i class="fal fa-bookmark text-2xl fa-fw mr-4"></i>
                <a class="text-2xl font-normal text-gray-600" href="">Bookmark</a>
            </div>
        </li>
        <li class="ml-4 py-2">
            <div class="flex items-center">
                <i class="fal fa-stream text-2xl fa-fw mr-4"></i>
                <a class="text-2xl font-normal text-gray-600" href="">Lists</a>
            </div>
        </li>
        <li class="ml-4 py-2">
            <div class="flex items-center">
                <i class="fal fa-user text-2xl fa-fw mr-4"></i>
                <a class="text-2xl font-normal text-gray-600" href="{{route('profile',current_user())}}">Profile</a>
            </div>
        </li>
        <li class="ml-4 py-2">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="ml-11 text-2xl font-normal text-gray-600">Logout</button>
            </form>
        </li>
    </ul>
</div>
