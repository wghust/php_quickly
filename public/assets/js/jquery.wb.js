jQuery.fn.extend({
	pic_scroll:function() {
		$(this).each(function(){
			var _this = $(this);
			var ul = _this.find("ul");
			var li = ul.find("li");
			// console.log(li.width());

			var w = li.size()*(li.width()+18);
			// console.log(w);
			li.clone().prependTo(ul);
			ul.width(2*w);
			var i=1,l;
			_this.hover(function(){i=0},function(){i=1});
			setInterval(function(){
				l = _this.scrollLeft();
				if(l<w) {
					_this.scrollLeft(l+i);
				} else {
					_this.scrollLeft(0);
				}
			},20);
		})
	}
})