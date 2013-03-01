<?php
$no_visible_elements=true;
include('header.php'); 
?>


<script type="text/javascript">
<!--
$(function () {
	$(".btn-login").click(function () 
	{
		var uname = $("#username").val(), //用户名
		pwd = $("#password").val();//用户密码
		$("#login-form input").attr('disabled', true);
		$('.remember').unbind('click');
		//已经向服务器提交了信息，所以将页面上的所有输入框按钮设置成不可用状态，这样可以有效的避免重复提交
		changeLoginInfo("正在登陆……","alert-info");
		ajaxCheck(uname, pwd);
	});
	var ajaxCheck = function (uname, pwd, remb) {
		$(".btn-master").addClass("visibility");
		var $params = "user_name=" + decodeURI(uname) + "&user_pwd=" + decodeURI(pwd) ;
		$.ajax({
			type: 'POST',
			url: BASE_URL+'start/login_confirm',
			//async: false,
			cache: false,
			dataType: 'json',
			data: $params,
			success: function (data) {
				if (data == 1) {
					if ($('#remember-long').attr('checked')) { //记住密码
						$.cookie('UserName', uname, { expires: 7, path: '/' });
						$.cookie('Password', pwd, { expires: 7, path: '/' });
					}
					else {//取消记住的密码，或者没有记住密码
						$.cookie('UserName', null,{ expires: 7, path: '/' });
						$.cookie('Password', null,{ expires: 7, path: '/' });
					}
					changeLoginInfo("登陆成功","alert-success");
					location.href = BASE_URL+"start/home";				
				}else {
					changeLoginInfo("登陆失败","alert-error");
					$("#login-form input").attr('disabled', false);
				}
			},
			error: function () {
				changeLoginInfo("超时，请重新登陆","alert-error");
				$("#login-form input").attr('disabled', false);
				$('.remember').bind('click', function () { checkClick(); });
				$(".btn-master").removeClass("visibility");
			}
		});
	};

	rememberPassword();
	
	$(document).bind('keydown', 'return', function () { $(".btn-login").trigger('click'); });
	
});

function changeLoginInfo(info,error)
{
	$("#login-info").removeClass();
	$("#login-info").addClass("alert");
	$("#login-info").addClass(error);
	$("#login-info").text(info);
}
function rememberPassword() {//页面加载完成之后执行自动登录检查
	var ckname = $.cookie('UserName');
	var ckpwd = $.cookie("Password");
	var logout = $.cookie("logout");//判断用户是否是从内部退出
	
	if (ckname != "" && ckpwd != "" && ckname != null && ckpwd != null) {
		$('#remember-long').attr('checked', true);
		$("#username").val(ckname); //用户名
		$("#password").val(ckpwd); //用户密码
	}
	else {
		$('#remember-long').attr('checked', false);
	}
}


//-->
</script>


			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>欢迎使用视频监控系统</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info" id="login-info">
						请使用您的用户名和密码登录.
					</div>
					
					<form class="form-inline " id="login-form" action="#" method="post">
						<fieldset>
							<div class="input-prepend " title="用户名" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text"  />
							</div>
							<div  class="input-prepend"></div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="密码" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password"  />
							</div>
						
							<div  class="input-prepend"> </div>
							<div class="clearfix"></div>

							<div class="input-prepend ">							
								<label class="checkbox remember" 	>
									<input type="checkbox" class="" id="remember-long"  /> 记住密码  </label>
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="button" class="btn btn-primary btn-login" >登录</button>
							</p>
						</fieldset>
					</form>
					<div class="login_Panel_bottom">
                   	 	<a id="hreDownLoad" href ="<?php echo $pluginFilePath?>"  class="pull-left" style="display:block;">插件下载</a>
                	</div>
				</div><!--/span-->
			</div><!--/row-->
		
		
<?php include('footer.php'); ?>
