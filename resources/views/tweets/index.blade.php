<x-app>
    @push('styles')
        <style>
            .fileUploadWrap {
                padding-top: 10px;
                position: relative;
            }
            .fileUploadWrap > i {
                position: absolute;
                cursor: pointer;
                /*   below means you can click through the image onto the invisible input */
                pointer-events: none;
                width:50px;
                top: 50%;
                transform: translatey(-50%);
            }
            .fileName {
                position: absolute;
                left: 50px;
                top: -8px;
                pointer-events: none;
            }
            input[type=file] {
                margin-left: -25px;
                opacity: 0;
            }

        </style>
    @endpush
    <div class="px-5 border-b border-gray-200 h-14 lg:fixed lg:bg-white lg:z-40 lg:top-0" style="min-width: 31.12%;">
        <h3 class="text-lg p-3 font-bold">Home</h3>
    </div>
    <div class="lg:pt-20 lg:z-0 relative">
        @include('_publish_tweet_panel')
        @include('_timeline')
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                input[type='file']",function(){
                if ($(this).val()) {

                    var filename = $(this).val().split("\\");

                    filename = filename[filename.length-1];

                    $('.fileName').text(filename);
                }

                if (window.File && window.FileList && window.FileReader) {
                    $("#files").on("change", function (e) {
                            var f = e.target.file;
                            var fileReader = new FileReader();
                            fileReader.onload = (function (e) {
                                var file = e.target;
                                $("<span class=\"pip\">" +
                                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                    "<br/><span class=\"remove\">Remove image</span>" +
                                    "</span>").insertAfter("#files");
                                $(".remove").click(function () {
                                    $(this).parent(".pip").remove();
                                });

                                // Old code here
                                /*$("<img></img>", {
                                  class: "imageThumb",
                                  src: e.target.result,
                                  title: file.name + " | Click to remove"
                                }).insertAfter("#files").click(function(){$(this).remove();});*/

                            });
                            fileReader.readAsDataURL(f);
                        }
                    );
                } else {
                    alert("Your browser doesn't support to File API")
                }
            })
            ;
        </script>
    @endpush
</x-app>