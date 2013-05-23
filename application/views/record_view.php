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
			<div class="row ">
			
			<div class="box span5">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-calendar"></i>查询条件</h2>
					  	<div class="box-icon">
						  <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
				  	</div>
					<div class="box-content" >
					
						<form id="form_recordQuery" class="form-horizontal">
				      		<fieldset>
				      			<div class="control-group">
						  			<label class="control-label" for="recordType">录像类型</label>
						  				<div class="controls">
										  <select name="recordType" id="recordType">
											<option>前端录像</option>
										  </select>
										</div>
						 		</div>
				      			<div class="control-group">
						  			<label class="control-label" for="mydevice">查询设备</label>
						  				<div class="controls">
										  <select name="mydevice" id="mydevice">
										  </select>
										</div>
						 		</div>
				      			
								<div class="control-group ">
							 		<label class="control-label" for="startTime">开始时间</label>
							  		<div class="controls">
							    		<input type="text" class=" datetimepicker" name="startTime" id="startTime">
							  		</div>
								</div>
								<div class="control-group">
						  			<label class="control-label" for="endTime">结束时间</label>
						  			<div class="controls">
						    			<input type="text" class=" datetimepicker" name="endTime" id="endTime">
						  			</div>
								</div>
							 	<div class="form-actions">
						  			<button type="submit" class="btn btn-primary">查询录像</button>
						  			
								</div>
					      	</fieldset>
					   	</form>	
					   
						
					</div>
				</div><!-- span -->
				
				<div class="box span6" >
					<div class="box-header well" data-original-title >
						<h2><i class="icon-globe"></i> 录像播放</h2>
						<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
				
					<div class="box-content" >
						
	      				<div id="movie1" style="width:550px;height:412px;">
	      				</div> 
	      				<!-- 
						<form class="well form-inline">
							<input type="text" id="recordFile" placeholder="点击选择视频文件"></input>
							<input type="button" class="btn"  value="播放视频"></input>
						</form>
						 -->
					</div>
				</div><!--/span-->
				
			</div><!--/row-->
		
			<div class="row">	
				<div class="box span11">
					<div class="box-header well" data-original-title>
						<h2>查询结果</h2>
						<div class="box-icon">	
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>#</th>
									  <th>开始时间</th>
									  <th>结束时间</th>
									  <th>大小</th>   
									  <th>备注</th>    
									  <th>操作</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td>Kaer</td>
									<td>Kaer</td>
									<td>移动侦测</td>
									<td class="center">2012/01/01</td>
									<td class="center">Member</td>
									<td class="center">
										<span class="label label-success">Active</span>
										<span class="label label-success">Active</span>
										<span class="label label-success">Active</span>
										<span class="label label-success">Active</span>
									</td>                                       
								</tr>
							              
							                     
							  </tbody>
						 </table>  
					</div>
				</div><!--/span-->
			</div><!--/row-->
<?php include('footer.php'); ?>

<script type="text/javascript">
<!--

$(function () {
	$("#menu-recorder").addClass("active");
	//$("#movie1").hide();
	setDivMode(202);
	OwnDevRefresh();
	
	$("#form_recordQuery").validate({
		rules: {
			startTime:"required",
			endTime:"required",
			recordType:"required",
			mydevice:"required"
				},
		messages: {
			startTime:"请输入录像开始时间",
			endTime:"请输入录像结束时间",
			recordType:"请输入查询录像类型",
			mydevice:"请选择需要查询的设备"
				},
		submitHandler: function(form){  
			return QueryRecordFileList();
		}
	});
	
	var currentDate = new Date();
	currentDate.setHours(0,0,0);
	$("#startTime").datetimepicker('setDate', currentDate );
	currentDate.setHours(23,59,59);
	$("#endTime").datetimepicker('setDate', currentDate );
	
});

function openPlayZone()
{
  if($("#movie1").is(":hidden"))
  { 
	$("#image").attr("src","../img/arrowUp1.png");  
    //$("#objectZone").css({width:"100%",height:"320px"});
    $("#movie1").show();
  }else
  {
	$("#image").attr("src","../img/arrowDown1.png");
	//$("#objectZone").css({width:"0%",height:"0px"});
	$("#movie1").hide();
  }
}


function OwnDevRefresh()
{
	$.ajax({
		type: 'POST',
		url: BASE_URL+'command/OwnDeviceList',
		dataType: 'json',
		data:"",
		success: function (data) {
			$("#mydevice option").remove();
			xmlDoc = loadXMLString(data);
			x=xmlDoc.getElementsByTagName("Info");
			for (var i=0;i<x.length;i++)
		  	{ 
				var NodeName = x[i].getAttribute("N");
				var NodeID = x[i].getAttribute("ID");
				var online = x[i].getAttribute("S");
				if(online == 1)	
				{
					$("#mydevice").append("<option value="+NodeID+">"+NodeName+"</option>");
				}
		  	}
		},
		error: function () {
			AlertMessage("获取拥有设备列表"+"操作失败","error");
		}
	});
}

function QueryRecordFileList()
{
	var player = document.getElementById("player");
	if(player == null)
	{
		return false;
	}
	var vText = $("#mydevice").find("option:selected").val();
	var startTime=new Date($("#startTime").datetimepicker("getDate"));
	var endTime = new Date($("#endTime").datetimepicker("getDate"));
	var camID = $("#mydevice option:selected").val();
	camID = camID*256+1;
	var retStr = player.QueryRecordFileList(camID,startTime.getTime()/1000,endTime.getTime()/1000,1);
	var obj = JSON.parse(retStr);
	if (obj.retValue == 13) {
		AlertMessage("操作成功","success");
	} else {
		AlertMessage("操作失败-"+obj.retDes,"error");
	}
	return true;
}
//-->
</script>