$(document).ready(function() {
    var url = window.location.href;
    var thisfile = url.substring(url.lastIndexOf('/') + 1, url.length);
    // console.log(thisfile);
    $.post("assets/inc/session.inc.php", function(callback) {
        if (thisfile === "login.html" || thisfile === "register.html") {
            if (callback) {
                alert("你已经登录！");
                window.location.href = "./index.php";
            }
        } else {
            if (!callback) {
                window.location.href = "login.html";
            }
        }
    });
});