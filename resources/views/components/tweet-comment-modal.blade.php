<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 z-40 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">

        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                 viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-start pb-3">
                <div class="flex justify-center items-start flex-wrap flex-col">
                    <div>
                        <img id="commentImg" src=""
                             alt=""
                             class="rounded-full mr-4"
                             width="50"
                             height="50"
                        />
                    </div>
                </div>
                <div class="flex-1 items-center">
                    <div class="flex flex-row flex-wrap space-x-2">
                        <div id="realName" class="font-bold"></div>
                        <div id="userName"></div>
                        <div id="createdAt"></div>
                    </div>
                    <p id="userBody"></p>
                </div>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex justify-between items-start">
                <p>
                    <img src="{{current_user()->avatar}}"
                         alt=""
                         class="rounded-full mr-4"
                         width="50"
                         height="50"
                    />
                </p>
                <div class="flex-1 items-center">
                    <form id="modalForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <textarea name="comment"
                                  class="w-full placeholder-gray-600 border-0 focus:outline-none text-lg"
                                  placeholder="What's Happening?" required></textarea>
                        <div class="yes">
                            <img id="ImgPreviewComment" src="" class="preview_comment"/>
                            <input type="button" id="removeImageComment" value="x" class="btn-rmv1"/>
                        </div>
                        @error('comment')
                        <p class="text-red-400 text-sm mt-2">{{$message}}</p>
                        @enderror
                        <div class="flex justify-between px-3 pt-3 pb-3">
                            <div class="flex justify-start text-blue-400 lg:pt-2 text-2xl">
                                <div class="image-upload">
                                    <label for="file-input-comment">
                                        <i class="fal fa-image fa-fw"
                                           style="font-size: 26px; margin-top: 5px; cursor: pointer;"></i>
                                    </label>
                                    <input id="file-input-comment" type="file"
                                           accept="image/jpeg, image/png, image/gif, image/jpg" name="image">
                                </div>
                                <a class="flex-initial" href=""><i class="fal fa-calendar-check fa-fw ml-2"></i></a>
                            </div>
                            <button class="bg-blue-400 rounded-full py-2 px-7 shadow text-sm text-white hover:bg-blue-500" onclick="this.disabled=true;this.form.submit();this.form.reset();">
                                Reply
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>