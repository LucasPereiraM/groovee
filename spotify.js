window.onSpotifyIframeApiReady = (IFrameAPI) => {
    let element = document.getElementById('embed-iframe');
    let options = {
        uri: 'https://open.spotify.com/track/2073QOEC8rBtSyTsRyaWiP?si=c5e6a93ada5f4eed'
    };
    let callback = (EmbedController) => {};
    IFrameAPI.createController(element, options, callback);
};