<div class="bg-gray-200 border border-gray-300 py-4 px-6 rounded-xl">
    <h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>
        @forelse(current_user()->follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-3' }}">
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
        @empty
            <li>No friend's yet!</li>
        @endforelse
    </ul>
</div>