$(document).ready(function() {
    // 权限显示

    function showlist(element) {
        element.hover(function() {
            var _this = $(this);
            _this.children("ul").css({
                'display': 'block'
            });
            _this.children("ul").animate({
                'margin-top': '5px',
                'opacity': '1'
            }, 200);
        }, function() {
            var _this = $(this);
            _this.children("ul").animate({
                'margin-top': '0px',
                'opacity': '0'
            }, 200, function() {
                _this.children("ul").css({
                    'display': 'none'
                });
            });
        });
    }
    $.post('assets/inc/header.inc.php', function(callback) {
        // console.log(callback);
        $(".navleft").html(callback);
        showlist($(".qx"));
    })
});