<h3 class="font-bold text-lg mb-4">Followings</h3>
<ul>
    @foreach(auth()->user()->follows as $user)
        <li class="mb-3">
            <div class="flex items-center text-sm">
                <img src="{{ $user->avatar }}"
                     alt=""
                     class="rounded-full mr-4"/>
                {{ $user->name }}
            </div>
        </li>
    @endforeach
</ul>