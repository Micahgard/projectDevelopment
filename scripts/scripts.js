function goBack() {
    //window.history.back();
    window.history.go(-2);
}

function notificationGoBack() {
        setTimeout(function () {
            window.location=document.referrer;
            //window.history.back();
        }, 6000);
}