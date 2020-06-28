function goBack() {
    window.history.back();
}

function notificationGoBack() {
        setTimeout(function () {
            window.history.back();
            location.reload();
        }, 6000);
}

function showNotification() {
    let x = document.getElementById("notification");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}