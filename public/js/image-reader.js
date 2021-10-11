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

$("#file-input-comment").change(function () {
    var imgControlName = "#ImgPreviewComment";
    readURL(this, imgControlName);
    $('.preview_comment').addClass('it');
    $('#removeImageComment').addClass('rmv');
});

$("#removeImage1").click(function (e) {
    e.preventDefault();
    $("#file-input").val("");
    $("#ImgPreview").attr("src", "");
    $('.preview1').removeClass('it');
    $(this).removeClass('rmv');
});

$("#removeImageComment").click(function (e) {
    e.preventDefault();
    $("#file-input-comment").val("");
    $("#ImgPreviewComment").attr("src", "");
    $('.preview_comment').removeClass('it');
    $(this).removeClass('rmv');
});