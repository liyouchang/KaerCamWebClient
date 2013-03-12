
<?php
$no_visible_elements=true;
include('header.php');
?>
<script type="text/javascript">

$(document).ready(function () {
	
	$("#forget-pwd-form").validate({
		rules: {
			username: {
				required: true,
				maxlength: 8
			},

			email: {
				required: true,
				email: true
			}
		},
		messages: {
			username: {
				required: "请输入用户名",
				maxlength:"用户名长度为8"
							},
			
			email: "请输入正确的email地址",
		},
		submitHandler: function(){  alert("submit");}
	});
});

	
</script>


			<div class="row-fluid">
				<div class="span3"></div>
				<div class=" span5 ">
					<h2></h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="span3"></div>
				<div class="well span6  " style="margin-top:50px">
					<form  class="form-horizontal" id="forget-pwd-form" action="#" >
					 	<fieldset>
					 		<legend>获取密码</legend>
					 		
					 		<div class="alert alert-info center" id="login-info">
								请输入您注册的用户名和Email以获取密码
							</div>
						   	<div class="control-group">
						    	<label class="control-label" for="userName">用户名</label>
						    	<div class="controls">
						     		<input type="text" name="username" id="username" value="" placeholder="请输入您的用户名">
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
						    	  	<button type="submit" class="btn span3 btn-primary">获取密码</button>
						      		<a href=<?php echo base_url('login')?> class="btn span3">返回登陆</a>
								</div>
						    </div>
					    </fieldset>
					</form>
					
				</div><!--/span-->
			</div><!--/row-->
		





<?php include('footer.php'); ?>