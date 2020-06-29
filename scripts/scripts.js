function goBack() {
    window.history.back(); // back to previous page
}

function notificationGoBack() {
    setTimeout(function () {
        window.location = document.referrer;  // back to previous page
    }, 6000);
}