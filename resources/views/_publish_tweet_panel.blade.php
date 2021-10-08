@push('styles')
    <style>
        .image-upload > input {
            display: none;
        }

        .yes {
            position: relative;
            display: flex;
            align-items: flex-start;
            margin-top: 10px !important;
        }

        .it {
            height: 100px;
            margin-left: 10px;
        }

        .btn-rmv1 {
            display: none;
        }

        .rmv {
            cursor: pointer;
            color: #fff;
            border-radius: 50%;
            border: 1px solid #fff;
            display: inline-block;
            background: #39383880;
            margin: -5px -10px;
            padding: 0px 7px;
        }

        .rmv:hover {
            background: #10101080;
        }


    </style>
@endpush

<div class="px-5 py-3 border-b border-t border-gray-200">
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
                        <input id="file-input" type="file"/>
                    </div>
                    <a class="flex-initial" href=""><i class="fal fa-calendar-check fa-fw"></i></a>
                </div>
                <button type="submit"
                        class="bg-blue-400 rounded-full py-2 px-7 shadow text-sm text-white hover:bg-blue-500">Tweet
                </button>
            </footer>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        function readURL(input, imgControlName) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(imgControlName).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-input").change(function () {
            var imgControlName = "#ImgPreview";
            readURL(this, imgControlName);
            $('.preview1').addClass('it');
            $('#removeImage1').addClass('rmv');
        });

        $("#removeImage1").click(function (e) {
            e.preventDefault();
            $("#file-input").val("");
            $("#ImgPreview").attr("src", "");
            $('.preview1').removeClass('it');
            $(this).removeClass('rmv');
        });
    </script>
@endpush
