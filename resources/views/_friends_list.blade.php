<div class="flex justify-start flex-col">
    <div class="py-1 lg:fixed lg:bg-white lg:z-40 lg:top-0 focus:border-blue-500" style="min-width: 31%;">
        <form>
            <label class="flex justify-start text-sm bg-gray-100 rounded-full lg:w-6/12 lg:ml-3">
                <div><i class="fal fa-search px-5 py-4 text-md font-normal fa-fw"></i></div>
                <input type="search" name="" id="" class="pl-3 bg-gray-100 placeholder-gray-600 text-lg rounded-r-full focus:outline-none w-full pr-3" placeholder="Search Twitter">
            </label>
        </form>
    </div>
    <div class="lg:mt-16 lg:z-0 bg-gray-100 border py-4 px-6 rounded-xl mt-2">
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
</div>