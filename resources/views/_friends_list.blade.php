<h3 class="font-bold text-lg mb-4">Followings</h3>
<ul>

    @foreach(auth()->user()->follows as $user)
        <li class="mb-3">
            <div>
                <a class="flex items-center text-sm" href="{{route('profile',$user)}}">
                    <img src="{{$user->avatar}}"
                         alt=""
                         class="rounded-full mr-4"
                         width="40"
                         height="40"
                    />
                    {{ $user->name }}
                </a>
            </div>
        </li>
    @endforeach
</ul>