@push('styles')
    <style>
        body.modal-open {
            overflow: hidden;
        }

        .img-preview {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
@endpush

<x-app>
    <div class="px-5 lg:fixed lg:bg-white lg:z-10 lg:top-0" style="min-width: 31.12%;">
        <div class="flex justify-start items-center gap-2 py-2">
            <div class="cursor-pointer pt-2" onclick="window.history.back();"><i
                        class="fal fa-long-arrow-left text-xl font-normal fa-fw text-left" style="min-width: 56px;"></i>
            </div>
            <h3 class="text-lg font-bold">Tweet</h3>
        </div>
    </div>
    <div class="lg:pt-14 lg:z-0">
        <div class="flex flex-col border-b border-t border-gray-200 px-4 pt-2">
            <div class="flex items-center mr-4 flex-shrink-0">
                <a href="{{$tweet->user->profilePath()}}">
                    <img src="{{$tweet->user->avatar}}"
                         alt=""
                         class="rounded-full mr-4"
                         width="50"
                         height="50"
                    />
                </a>
                <h5 class="font-bold">
                    <a href="{{$tweet->user->profilePath()}}">
                        {{ $tweet->user->name }} <span class="font-light">{{ ' @'.$tweet->user->username }}</span>
                    </a>
                </h5>
            </div>
            <p class="text-sm mb-3 mt-2">
                {{$tweet->body}}
                @if(!empty($tweet->image))
                    <span>
                <img src="{{$tweet->image}}" class="img-preview">
            </span>
                @endif
            </p>
            <div class="flex justify-start border-t border-gray-200 text-gray-600 py-2 space-x-3">
                <p class="text-sm">{{ $tweet->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex justify-start border-t border-gray-200 text-gray-600 py-2 space-x-3">
                <p class="text-sm"><span class="text-black font-bold">{{ $tweet->likes ?: 0 }}</span> Likes</p>
                <p class="text-sm"><span class="text-black font-bold">{{ $tweet->dislikes ?: 0 }}</span> Dislikes</p>
                <p class="text-sm"><span class="text-black font-bold">{{ $tweet->comments ?: 0 }}</span> Comments</p>
            </div>
            <div class="flex justify-between border-t border-gray-200 py-2">
                <div class="flex">
                    <div class="flex items-center mr-4 cursor-pointer {{$tweet->isLikedBy(current_user()) ? 'text-blue-500 font-semibold' : 'text-gray-500'}}"
                         onclick="likeTweet(this,'{{$tweet->id}}');">
                        <svg viewBox="0 0 20 20" class="w-3 mr-1">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g class="fill-current">
                                    <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z"
                                          id="Fill-97"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="flex items-center cursor-pointer {{$tweet->isDisLikedBy(current_user()) ? 'text-blue-500 font-semibold' : 'text-gray-500'}}"
                         onclick="disLikeTweet(this,'{{$tweet->id}}');">
                        <svg viewBox="0 0 20 20" class="w-3 mr-1">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g class="fill-current">
                                    <path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z"
                                          id="Fill-97"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <div>
                    <button class="comment-modal modal-open bg-blue-400 rounded-full py-2 px-7 shadow text-sm text-white hover:bg-blue-500"
                            data-tweet-id="{{$tweet->id}}" data-img="{{$tweet->user->avatar}}"
                            data-name="{{$tweet->user->name}}" data-username="{{$tweet->user->username}}"
                            data-time="{{\Carbon\Carbon::parse($tweet->created_at)->isoFormat('MMM D')}}"
                            data-body="{{$tweet->body}}">Reply
                    </button>
                </div>
            </div>
        </div>

        @forelse($comments as $subTweet)
            <div class="flex flex-col border-b border-gray-200 px-4 pt-2 {{$loop->last ? 'mb-2' : ''}}">
                <div class="flex items-center mr-4 flex-shrink-0">
                    <a href="{{$subTweet->user->profilePath()}}">
                        <img src="{{$subTweet->user->avatar}}"
                             alt=""
                             class="rounded-full mr-4"
                             width="50"
                             height="50"
                        />
                    </a>
                    <h5 class="font-bold">
                        <a href="{{$subTweet->user->profilePath()}}">
                            {{ $subTweet->user->name }} <span
                                    class="font-light">{{ ' @'.$subTweet->user->username }}</span>
                        </a>
                    </h5>
                </div>
                <p class="text-sm mb-3 mt-2">
                    {{$subTweet->body}}
                    @if(!empty($subTweet->image))
                        <span>
                            <img src="{{$subTweet->image}}" class="img-preview">
                        </span>
                    @endif
                </p>
                <div class="flex justify-between pb-2">
                    <div class="flex">
                        <div class="flex items-center mr-4 cursor-pointer {{$subTweet->isLikedBy(current_user()) ? 'text-blue-500 font-semibold' : 'text-gray-500'}}"
                             onclick="likeTweet(this,'{{$subTweet->id}}');">
                            <svg viewBox="0 0 20 20" class="w-3 mr-1">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g class="fill-current">
                                        <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z"
                                              id="Fill-97"></path>
                                    </g>
                                </g>
                            </svg>
                            <p class="text-xs">{{ $subTweet->likes ?: 0 }}</p>
                        </div>

                        <div class="flex items-center cursor-pointer {{$subTweet->isDisLikedBy(current_user()) ? 'text-blue-500 font-semibold' : 'text-gray-500'}}"
                             onclick="disLikeTweet(this,'{{$subTweet->id}}');">
                            <svg viewBox="0 0 20 20" class="w-3 mr-1">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g class="fill-current">
                                        <path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z"
                                              id="Fill-97"></path>
                                    </g>
                                </g>
                            </svg>
                            <p class="text-xs">{{ $subTweet->dislikes ?: 0 }}</p>
                        </div>
                    </div>
                    <div class="flex items-center cursor-pointer space-x-1 {{$subTweet->isRepliedBy(current_user()) ? 'text-blue-500 font-semibold' : 'text-gray-500'}}">
                        <button class="comment-modal modal-open focus:outine-none outline-none" data-tweet-id="{{$subTweet->id}}" data-img="{{$subTweet->user->avatar}}" data-name="{{$subTweet->user->name}}" data-username="{{$subTweet->user->username}}" data-time="{{\Carbon\Carbon::parse($subTweet->created_at)->isoFormat('MMM D')}}" data-body="{{$subTweet->body}}"><i class="fas fa-comment"></i>
                        </button>
                        <p class="text-xs">{{ $subTweet->comments ?: 0 }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="p-2 border-b border-gray-100">No Comments</p>
        @endforelse
    </div>
</x-app>
