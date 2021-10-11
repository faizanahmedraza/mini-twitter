<x-app>
    <div class="px-5 h-14 lg:fixed lg:bg-white lg:z-10 lg:top-0" style="min-width: 31.12%;">
        <h3 class="text-lg p-3 font-bold">Home</h3>
    </div>
    <div class="lg:pt-14 lg:z-0">
        @include('_publish_tweet_panel')
        @include('_timeline')
    </div>
</x-app>
