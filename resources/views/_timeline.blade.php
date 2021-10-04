<div class="my-2">
    @forelse($tweets as $tweet)
        @include('_tweet')
    @empty
        <p class="p-4">No tweet's yet!</p>
    @endforelse
        {{$tweets->links()}}
</div>