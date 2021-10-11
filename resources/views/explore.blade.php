<x-app>
    <div>
        <div class="py-1 lg:fixed lg:bg-white lg:z-10 lg:top-0 lg:pl-5 focus:border-blue-500" style="min-width: 31%;">
            <form>
                <label class="flex justify-start text-sm bg-gray-100 rounded-full lg:w-10/12 lg:ml-3">
                    <div><i class="fal fa-search px-5 py-4 text-md font-normal fa-fw"></i></div>
                    <input type="search" name="" id=""
                           class="pl-3 bg-gray-100 placeholder-gray-600 text-lg rounded-r-full focus:outline-none w-full pr-3"
                           placeholder="Search Twitter">
                </label>
            </form>
        </div>
        @forelse($tweets as $tweet)
            <div class="{{ $loop->first ? 'pt-14' : '' }}">
                @include('_tweet')
            </div>
        @empty
            <p class="px-4 pb-4 pt-0">No tweet's yet!</p>
        @endforelse
        {{$tweets->links()}}
    </div>
</x-app>