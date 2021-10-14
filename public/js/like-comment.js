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