<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">其他功能</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">系统配置</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> </h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							<legend>本地保存路径</legend>
							<div class="control-group">
							  <label class="control-label " for="snapPath">本地抓拍图片保存路径</label>
							  <div class="controls">
								<input type="text" class="input-large" id="snapPath" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label " for="downPath">录像下载默认保存路径</label>
							  <div class="controls">
								<input class="input-large" id="downPath" type="text">
							  </div>
							</div>          
							<div class="control-group">
							  <label class="control-label" for="videoPath">本地录像默认保存路径</label>
							  <div class="controls">
								<input class="input-large" id="videoPath" ></input>
							  </div>
							</div>
							
						  </fieldset>
						</form>   
						<form class="form-horizontal">
							<fieldset>
								<legend>密码管理</legend>
								
								<div class="control-group">
							 	 	<label class="control-label " for="oldPassword" >旧密码</label>
							  		<div class="controls">
										<input type="password" class="input-large" id="oldPassword" value="" required>
							  		</div>
								</div>
								<div class="control-group">
							 	 	<label class="control-label " for="newPassword" >新密码</label>
							  		<div class="controls">
										<input type="password" class="input-large" id="newPassword" value="" required>
							  		</div>
								</div>
								<div class="control-group">
							 	 	<label class="control-label " for="againPassword" >密码重复</label>
							  		<div class="controls"> 
										<input type="password" class="input-large" id="againPassword" value="" required>
							  		</div>
								</div>
								<div class="form-actions">
							  		<button type="button" class="btn btn-info">保存</button>
								</div>
							</fieldset>
						</form>
						<form class="form-horizontal">
							<fieldset>
								<legend>告警通知</legend>
								
								<div class="control-group">
							 	 	<label class="control-label " for="alarmEmail1" ><span class="icon icon-color icon-mail-closed"></span></label>
							  		<div class="controls">
										<input type="email" class="input-large" id="alarmEmail1" >
							  		</div>
								</div>
								<div class="control-group">
							 	 	<label class="control-label " for="alarmEmail2" ><span class="icon icon-color icon-mail-closed"></span></label>
							  		<div class="controls">
										<input type="email" class="input-large" id="alarmEmail2" value="" >
							  		</div>
								</div>
								<div class="control-group">
							 	 	<label class="control-label " for="alarmEmail3" ><span class="icon icon-color icon-mail-closed"></span></label>
							  		<div class="controls"> 
										<input type="email" class="input-large" id="alarmEmail3" value="" >
							  		</div>
								</div>
								<div class="form-actions">
							  		<button type="button" class="btn btn-info">保存修改</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div><!--/span-->

			</div><!--/row-->

    
<?php include('footer.php'); ?>
