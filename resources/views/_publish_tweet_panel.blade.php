<div class="border border-gray-200 rounded-lg px-5 py-3">
    <div class="flex">
        <div class="mr-4 flex-shrink-0">
            <img src="{{current_user()->avatar}}"
                 alt=""
                 class="rounded-full mr-4"
                 width="50"
                 height="50"/>
        </div>

        <form class="flex-1" action="/tweets" method="POST">
            @csrf
            <textarea name="body" id="" class="w-full placeholder-gray-600 border-0 focus:outline-none text-lg"
                      placeholder="What's Happening?" autofocus required></textarea>
            @error('body')
            <p class="text-red-400 text-sm mt-2">{{$message}}</p>
            @enderror
            <hr class="my-2"/>

            <footer class="flex justify-between items-center">
                <div class="text-blue-400 lg:pt-2 text-2xl">
                    <a class="flex-initial pr-2" href=""><i class="fal fa-smile fa-fw"></i></a>
                    <a class="flex-initial" href=""><i class="fal fa-calendar-check fa-fw"></i></a>
                </div>
                <button type="submit"
                        class="bg-blue-400 rounded-full py-2 px-7 shadow text-sm text-white hover:bg-blue-500">Tweet
                </button>
            </footer>
        </form>
    </div>
</div>
