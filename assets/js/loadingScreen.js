function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000); //calls checkReady after 1s (1000)

    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this); //it calls the function that will make loading false and page true
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () { //calling the function
    show('page', true);
    show('loading', false);
});