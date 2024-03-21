import "./bootstrap";

window.onload = function () {
    var alert = document.getElementById("alert");
    if (!alert) {
        return;
    }
    alert.className = "show";
    setTimeout(function () {
        alert.className = alert.className.replace("show", "");
    }, 3000);
};
