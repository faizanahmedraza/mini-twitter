<x-app>
    <div class="px-5 border-b border-gray-200">
        <h3 class="text-lg p-3 font-bold">Home</h3>
    </div>
    <div class="mt-6 z-0">
        @include('_publish_tweet_panel')
        @include('_timeline')
    </div>
</x-app>
