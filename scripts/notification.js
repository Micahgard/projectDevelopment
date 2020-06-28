function goBack() {
    window.history.back();
}

function notificationGoBack() {
        setTimeout(function () {
            window.history.back();
        }, 5000);
}

function showNotification() {
    let x = document.getElementById("notification");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}