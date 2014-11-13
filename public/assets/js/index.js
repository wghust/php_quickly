$(document).ready(function() {

    // 滚动函数
    function navslide(index, element, thiswidth) {
        var _this = element;
        var _thismargin = index * thiswidth;
        element.children('.navslide_alley').animate({
            'margin-left': '-' + _thismargin + 'px'
        }, 500);
    }

    // 滚动事件相应
    $(".navigator ul li").click(function() {
        var _this = $(this);
        var _thisindex = _this.index();
        var _thiswidth = $(".navslide").width();
        _this.siblings('li').children('a').removeClass('active');
        _this.children('a').addClass('active');
        navslide(_thisindex, $(".navslide"), _thiswidth);
    });
});