<div class="px-5 py-3 border-b border-t border-gray-200">
    <div class="flex">
        <div class="mr-4 flex-shrink-0">
            <img src="{{current_user()->avatar}}"
                 alt=""
                 class="rounded-full mr-4"
                 width="50"
                 height="50"/>
        </div>

        <form class="flex-1" action="/tweets" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea name="body" id="" class="w-full placeholder-gray-600 border-0 focus:outline-none text-lg"
                      placeholder="What's Happening?" autofocus required></textarea>
            <div class="yes">
                <img id="ImgPreview" src="" class="preview1"/>
                <input type="button" id="removeImage1" value="x" class="btn-rmv1"/>
            </div>
            @error('body')
            <p class="text-red-400 text-sm mt-2">{{$message}}</p>
            @enderror
            <hr class="my-2"/>

            <footer class="flex justify-between items-center">
                <div class="flex justify-start text-blue-400 lg:pt-2 text-2xl">
                    <div class="image-upload">
                        <label for="file-input">
                            <i class="fal fa-image fa-fw" style="font-size: 26px; margin-top: 5px; cursor: pointer;"></i>
                        </label>
                        <input id="file-input" type="file" accept="image/jpeg, image/png, image/gif, image/jpg" name="image">
                    </div>
                    <a class="flex-initial" href=""><i class="fal fa-calendar-check fa-fw ml-2"></i></a>
                </div>
                <button type="submit"
                        class="bg-blue-400 rounded-full py-2 px-7 shadow text-sm text-white hover:bg-blue-500">Tweet
                </button>
            </footer>
        </form>
    </div>
</div>
