
<?php
$no_visible_elements=true;
include('header.php');
?>
<script type="text/javascript">

$(document).ready(function () {
	$("#register-form").validate({
		rules: {
			myUserName: {
				required: true,
				maxlength: 8
			},
			myPassword: {
				required: true,
				maxlength: 8
			},
			confirm_password: {
				required: true,
				equalTo: "#myPassword"
			},
			email: {
				required: true,
				email: true
			},
				
			agree: "required"
		},
		messages: {
			myUserName: {
				required: "请输入用户名",
				maxlength:"用户名长度为8"
			},
			myPassword: {
				required: "请输入密码",
				maxlength:"密码最大长度为8"
			},
			confirm_password: {
				required: "请输入确认密码",
				equalTo: "确认密码与密码需一致"
			},
			
			email: "请输入正确的email地址",
			agree: "需要同意用户协议"
		},
		submitHandler: function(){  alert("submit");}
		
	});
});

	
</script>


			<div class="row-fluid">
				<div class="span3"></div>
				<div class=" span5 ">
					<h2>用户注册</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="span3"></div>
				<div class="well span6  ">
		
					<!-- <form class="form-inline " id="login-form" action="#" method="post"> -->
					<form  class="form-horizontal" id="register-form" >
					 
					   <div class="control-group">
					    <label class="control-label" for="myUserName">用户名</label>
					    <div class="controls">
					      <input type="text" name="myUserName" id="myUserName" value="" placeholder="使用数字、字母及下划线">
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label" for="myPassword">密码</label>
					    <div class="controls">
					      <input type="password" name="myPassword" id="myPassword" value="" placeholder="请输入用户密码"> 
					    </div>
					  </div>
					  
					  <div class="control-group">
					    <label class="control-label" for="confirm_password">确认密码</label>
					    <div class="controls">
					      <input type="password" name="confirm_password" id="confirm_password" placeholder="请确认密码">
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label" for="email">Email</label>
					    <div class="controls">
					      <input type="text" id="email" name="email" placeholder="请输入您的邮箱">
					    </div>
					  </div>
					  
					  <div class="control-group">
					    <div class="controls">
					      <label id="agree"  class="checkbox"><input name="agree" type="checkbox"> 我同意<a href="login">用户协议</a></label>
					    </div>
					   </div>
					    <div class="control-group">
					    <div class="controls">
					    	  <button type="submit" class="btn span3 btn-primary">注册</button>
					      <a href=<?php echo base_url('login')?> class="btn span3">返回登陆</a>
						</div>
					    </div>
					
					</form>
					
				</div><!--/span-->
			</div><!--/row-->
		





<?php include('footer.php'); ?>