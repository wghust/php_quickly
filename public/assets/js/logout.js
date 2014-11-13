$(document).ready(function() {
    $.post('assets/inc/sessionbroke.inc.php', function(callback) {});
    var begintime = 2;
    lasttime = function() {
        $('.lasttime').text(begintime);
        begintime--;
        if (begintime >= 0) {
            setTimeout(lasttime, 1000);
        } else {
            window.location.href = 'login.html';
        }
    }
    lasttime();
});