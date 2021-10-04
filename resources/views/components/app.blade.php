<x-master>
    <main class="container lg:flex lg:items-start">
        <header class="flex justify-start lg:w-64 lg:h-full lg:fixed lg:inset-y-0 lg:left-0 lg:mx-10">
            @include('_sidebar-links')
        </header>
        <div class="lg:flex lg:justify-between lg:ml-80 lg:overflow-y-auto w-full">
            <div class="lg:flex-0 lg:w-full border-r border-l border-gray-100" style="max-width: 600px;">
                {{$slot}}
            </div>
            <div class="lg:flex-grow lg:mx-5">
                @include('_friends_list')
            </div>
        </div>
    </main>
</x-master>