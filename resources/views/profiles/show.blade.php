<x-app>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="/images/banner.jpg" alt="" class="w-full h-2/4 rounded-2xl mb-2">
            <img src="{{$user->avatar}}"
                 alt=""
                 width="130"
                 class="rounded-full absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2"/>
        </div>
        <div class="flex justify-between items-center mb-6">
            <div class="max-w-xs">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex">
                @can('edit',$user)
                    <a href="{{$user->profilePath('edit')}}" class="rounded-full py-2 px-6 border border-gray-300 text-black text-sm mr-2">Edit
                        Profile</a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p class="text-sm">
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
            letters, as opposed to using 'Content here, content here', making it look like readable English.
        </p>
    </header>

    @include('_timeline',[
    'tweets' => $tweets])
</x-app>
