function likeTweet(input, tweetId) {
    axios.post('/tweets/' + tweetId + '/like', {tweet: tweetId}).then((resolve) => {
        if (resolve) {
            location.reload();
        }
    });
}

function disLikeTweet(input, tweetId) {
    axios.delete('/tweets/' + tweetId, {tweet: tweetId}).then((resolve) => {
        if (resolve) {
            location.reload();
        }
    });
}

function commentModal(input, tweetId) {
    axios.post(`/admin/website/pages/inquiries/submit-answer`, {
        inquiryId,
        message
    }).then(function (response) {
        swal({
            title: response.data.msg,
            icon: "success",
            closeOnClickOutside: false
        }).then((successBtn) => {
            if (successBtn) {
                $("#inquiry_id,#message").val('');
                $("#guestModal").removeClass("fade").modal("hide");
                location.href = "/admin/website/pages/inquiries";
            }
        });
    }).catch(error => {
        console.clear();
    });
}