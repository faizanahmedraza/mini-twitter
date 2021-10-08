<x-app>
    <div class="px-5 border-b border-gray-200 lg:fixed lg:bg-white lg:z-40 lg:top-0" style="min-width: 31.12%;">
        <div class="flex justify-start items-center gap-2">
            <i class="fal fa-long-arrow-left text-xl font-normal fa-fw text-left" style="min-width: 56px;"></i>
            <div class="flex justify-start flex-col flex-wrap py-1">
                <h3 class="text-lg font-bold">{{strtoupper($user->name)}}</h3>
                <p class="text-sm mt-0 font-medium text-gray-500">{{$user->tweets()->count()}} <span>Tweets</span></p>
            </div>
        </div>
    </div>

    <header class="mb-6 pb-4 lg:pt-12 lg:z-0 relative border-b border-gray-200">
        <div class="relative">
            <img src="{{$user->banner}}" alt="" class="w-full h-48 mb-2">
            <img src="{{$user->avatar}}"
                 alt="{{$user->username}}"
                 width="130"
                 class="rounded-full absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2"/>
        </div>
        <div class="flex justify-between items-center mb-4 px-2">
            <div style="max-width: 230px;">
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-md text-gray-500">{{'@'.$user->username}}</p>
            </div>
            <div class="flex">
                @can('edit',$user)
                    <a href="{{$user->profilePath('edit')}}"
                       class="rounded-full py-2 px-6 border border-gray-300 text-black text-sm mr-2">Edit
                        Profile</a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <div class="flex flex-wrap flex-col px-2">
            <p class="text-sm">
                {{!empty($user->about) ? $user->about.'.': ''}}
            </p>
            <p class="text-sm text-gray-500 mt-2"><i class="fal fa-calendar-alt fa-fw mr-1"></i>
                Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
    </header>

    @include('_timeline',[
    'tweets' => $tweets])
</x-app>
