<div class="border border-gray-200 rounded-lg mt-2">
    @foreach($tweets as $tweet)
        @include('_tweet')
    @endforeach
</div>