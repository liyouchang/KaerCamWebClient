<?php include('header.php'); ?>

<!-- 
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">视频监控功能</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#"><?php echo $title?></a>
					</li>
				</ul>
			</div>
 -->
			<div class="row-fluid ">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-globe"></i> 录像播放</h2>
						<div class="box-icon">
							
						</div>
					</div>
				
					<div class="box-content">
						<form class="well form-inline">
							<input type="text" id="recordFile" placeholder="点击选择视频文件"></input>
							<input type="button" class="btn"  value="播放视频"></input>
						</form>
						<object id="UserProxy" class="center" style="WIDTH: 750px; HEIGHT: 500px; "  classid="clsid:9E89FD56-D8A5-4E04-97DF-8C4D670CAE74" VIEWASTEXT></object>
					</div>
				</div><!--/span-->
			</div><!--/row-->

<?php include('footer.php'); ?>
