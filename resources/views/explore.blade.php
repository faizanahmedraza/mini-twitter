<x-app>
    <div>
        @foreach($users as $user)
            <a href="{{$user->profilePath()}}" class="flex items-center mb-5">
                <img src="{{$user->avatar}}" alt="{{$user->username}}'s avatar" class="mr-4" width="60"/>

                <div>
                    <h4 class="font-bold">{{'@'.$user->username}}</h4>
                </div>
            </a>
        @endforeach
        {{$users->links()}}
    </div>
</x-app>