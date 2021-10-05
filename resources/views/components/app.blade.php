<x-master>
    <section class="mx-auto min-h-screen">
        <main class="grid grid-cols-12 gap-0">
            <header class="col-span-12 lg:col-start-3 lg:col-end-5 lg:col-span-2">
                @include('_sidebar-links')
            </header>
            <div class="col-span-12 lg:col-start-5 lg:col-end-9 lg:col-span-4 relative">
                <div class="border-r border-l border-gray-100 mx-5 relative">
                    {{$slot}}
                </div>
            </div>
            <div class="col-span-12 lg:col-start-9 lg:col-end-11 lg:col-span-2">
                @include('_friends_list')
            </div>
        </main>
    </section>
</x-master>