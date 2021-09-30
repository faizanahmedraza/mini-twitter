@extends('layouts.app')

@section('content')
    <header class="mb-6 relative">
        <img src="/images/banner.jpg" alt="" class="w-full h-2/4 rounded-2xl mb-2">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div>
                <a href="" class="rounded-full py-2 px-6 border border-gray-300 text-black text-sm mr-1">Edit
                    Profile</a>
                <a href="" class="bg-blue-400 rounded-full py-2 px-6 shadow text-white text-sm">Follow Me</a>
            </div>
        </div>

        <p class="text-sm">
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
            letters, as opposed to using 'Content here, content here', making it look like readable English.
        </p>

        <img src="{{$user->avatar}}"
             alt=""
             class="rounded-full absolute" style="width: 140px; left: calc(50% - 70px); top: 110px;"/>
    </header>

    @include('_timeline',[
    'tweets' => $user->tweets])
@endsection
