$(document).ready(function() {
    $(".loginsubmit").click(function() {
        begin_login();
    });
    begin_login = function() {
        var username = $(".username").val();
        var password = $(".password").val();
        var msg;
        msg = "";
        $(".warn_word").text(msg);
        $.post('show/comm/login.php', {
            'username': username,
            'password': password
        }, function(callback) {
            console.log(callback);
            // alert(callback);
            if (callback == 0) {
                msg = "登录成功";
                /*                  gotoindex(); */
                setTimeout(gotoindex, 1000);
            } else {
                msg = "用户不存在或者密码错误";
            }
        }).complete(function() {
            $(".warn_word").html(msg);
        });
    };
    $(window).keypress(function(e) {
        if (e.which === 13) {
            begin_login();
        }
    });
    gotoindex = function() {
        /* 		$(body).load('index.html'); */
        setTimeout("window.location.href='./index.php'", 1000);
        // window.location.href="index.html";
    }
});