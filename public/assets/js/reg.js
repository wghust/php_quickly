$(document).ready(function() {
	$(".regsubmit").click(function(){
		var username = $(".username").val();
		var email = $(".email").val();
		var password = $(".password").val();
		var msg;
		var email_check = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!email_check.test(email)) {
			msg = "";
			$(".warn_word").text(msg);
			msg = "邮箱不正确";
			$(".warn_word").text(msg);
		} else {
			msg = "";
			$(".warn_word").text(msg);
			$.post('assets/comm/reg.php',{'username':username,'email':email,'password':password},function(callback){
				if(callback==0) {
					msg = "用户已经存在";
				} else {
					if(callback==1) {
						msg = "注册成功";
						setTimeout(gotoindex,3000);
					} else {
						msg = "注册不成功";
					}
				}
			}).complete(function(){
				$(".warn_word").html(msg);
			});
		}
	})
	gotoindex = function(){
		window.location.href="index.html";
	}
});