function goBack() {
    window.history.back();
}

function notificationGoBack() {
        setTimeout(function () {
            window.location=document.referrer;
            //window.history.back();
        }, 6000);
}