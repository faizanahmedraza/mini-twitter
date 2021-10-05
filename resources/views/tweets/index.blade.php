<x-app>
    <div class="px-5 border-b border-gray-200 h-14 lg:fixed lg:bg-white lg:z-40 lg:top-0" style="min-width: 31%;">
        <h3 class="text-lg p-3 font-bold">Home</h3>
    </div>
    <div class="lg:pt-20 lg:z-0 relative z-0">
        @include('_publish_tweet_panel')
        @include('_timeline')
    </div>
</x-app>
