<?php include('header.php'); ?>

<script type="text/javascript">



//退出时先注销插件
function logout()
{
	if(!hasplug )
	{
		//document.URL = "/cwmp/logout.jsp";
	}else
	{
		if(login==true)
		{
		    var player = document.getElementById("player");
		   // player.LogOut();
		   
		}else
		{
			$("#infoText").text("插件正在登录，请稍后再试 ");
		}
	}
}

// 关闭页面时，调登出接口
//$(window).unload( function () {logout(); } );

</script>


<!-- 
			<div>
				<ul class="breadcrumb span12">
					<li>
						<a id="testColor" href="#">视频监控功能</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">实时监控</a>
					</li>
				</ul>
			</div>
-->
			<div class="row">	
				<div class="box span8">
					<div class="box-header well" data-original-title>
						<h2>视频窗口</h2>
						<div class="box-icon">
						<!-- 	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> -->
						</div>
					</div>
					
					<div class="box-content ">
						 
							<!--插件、及云台信息开始-->
							<!-- 插件定义开始 -->
							<div id="movie1" class="center">
							
							</div> 
							<!-- 插件定义结束 -->		
												
							<div id="camCtl" class=" box center" >
								<!-- 控制更多操作开始 -->
								<div class="controlH clearfix">
									<a class="btn btn-small" id="hidemore" onClick="javascript:advancedOption()">
									<!-- <span class="active icon icon-color icon-arrowstop-n" id="controlAdvancedIcon"></span> --> 
									 收起更多操作</a>
							
									 <div class="screen" id="screen">
										<span class="screen1" onClick="javascript:setDivMode(1)" ></span>
										<span class="screen4" onClick="javascript:setDivMode(4)" ></span>
										<span class="screen6" onClick="javascript:setDivMode(6)" ></span>
										<span class="screen8" onClick="javascript:setDivMode(8)" ></span>
									</div>
									<span class="pull-right " style="margin-right:5px">
									<i class="icon-exclamation-sign "></i>
									<span id="infoText" class="label label-info">操作成功</span>
									</span>
									<!-- 表格提示  -->
								</div>
								<!-- 控制更多操作结束 -->
								<!--云台区域信息开始  -->
								<div  class="pannel " id="advancedoption" >
									<!--云镜信息展示开始  -->
									<div class="pControl1">
										<a href="#PP" id="linkDir02"				
											onMouseOut=MM_swapImgRestore('direction02','direction_02','direction_on_02'); 
											onMouseOver=MM_swapImage('direction02','direction_02','direction_on_02');>
											<span title='上' id='direction02' class="direction_02" ></span>
										</a>
										<a href="#PP" id="linkDir04"					
											onMouseOut=MM_swapImgRestore('direction04','direction_04','direction_on_04'); 
											onMouseOver=MM_swapImage('direction04','direction_04','direction_on_04'); >
											<span  title='左' id='direction04' class="direction_04"></span>
										</a>
										<a href="#PP" id="linkDir05"					
											onMouseOut=MM_swapImgRestore('direction05','direction_05','direction_on_05'); 
											onMouseOver=MM_swapImage('direction05','direction_05','direction_on_05');>
											<span  title='自动' id='direction05' class="direction_05"></span> 
										</a>
										<a href="#PP" id="linkDir06"					
											onMouseOut=MM_swapImgRestore('direction06','direction_06','direction_on_06'); 
											onMouseOver=MM_swapImage('direction06','direction_06','direction_on_06');>
											<span  title='右' id='direction06' class="direction_06"></span>
										</a>
										<a href="#PP" id="linkDir08"					
											onMouseOut=MM_swapImgRestore('direction08','direction_08','direction_on_08'); 
											onMouseOver=MM_swapImage('direction08','direction_08','direction_on_08');>
											<span  title='下' id='direction08' class="direction_08"></span>
										</a>
									</div>
									<!--云镜信息展示结束  -->
							
									<!--焦距、步长控制开始  -->
									<div class="pControl2">
										<div class="pControl2-g1 clearfix">
											<span class="ptext label">光圈</span>
											<!--  <span title='自动' id='iconforcus' class="iconLay icon_forcus"></span>-->
											<span id='iconforcus' class="iconLay icon_forcus"></span>
											<a href="#PP" id="linkiconr" class="iconLay "> 
												<span title='关' id='iconreduce' class="icon_reduce"></span>
											</a>
											<a href="#PP" id="linkicona" class="iconLay">
												<span title='开' id='iconadd' class="icon_add"></span>
											</a>
										</div>
										<div class="pControl2-g2 clearfix">
											<span class="ptext label">焦距</span>
											<!-- <span title='自动' id='iconquan' class="iconLay icon_quan"></span> -->
											<span id='iconquan' class="iconLay icon_quan"></span>
											<a href="#PP" id="linkiconrq" class="iconLay">
												<span title='拉近' id='iconreducequan' class="icon_reduce"></span>
											</a>
											<a href="#PP" id="linkiconaq" class="iconLay">
												<span title='拉远' id='iconaddquan' class="icon_add"></span>
											</a>
										</div>
										<div class="pControl2-g3 clearfix">
											<span class="ptext label">变倍</span>
											<span id='iconfocus' class="iconLay icon_zoom"></span>
											<a href="#PP" id="linkiconrz" class="iconLay">
												<span title='减小' id='iconreducefocus' class="icon_reduce" ></span>
											</a>
											<a href="#PP" id="linkiconaz" class="iconLay">
												<span title='增大' id='iconaddfocus' class="icon_add" ></span>
											</a>
										</div>
										<div class="pControl2-g4 clearfix">
											<span class="ptext label">步长</span>
											<a href="#PP" id="linkbtns" title='减小步长' class="iconLay btn_small_on"></a>
											<span id="ptzstep" align="center" class="iconLay">
												<span id='stepsatus' title='步长' class="step_status_1"></span>
											</span>
											<a href="#PP" id="linkbtnl" title='增加步长' class="iconLay btn_large_on"></a>
										</div>
									</div>
									<!--焦距、步长控制结束  -->
							
									<!--语音、通信控制开始  -->
									<div class="pControl3">
										<div class="pControl3-g1 clearfix">
											<span class="ptext label">监听</span>
											<a href="#PP" id="linkboardo" class="iconLay"> 
												<span title='开始监听' id='boardopen' class="board_open"></span>
											</a>
											<a href="#PP" id="linkboardc" class="iconLay">
												<span title='停止监听' id='boardclose' class="board_close"></span>
											</a>
										</div>
										<div class="pControl3-g2 clearfix">
											<span class="ptext label">通话</span>
											<a href="#PP" id="linktelo" class="iconLay">
												<span title='开始通话' id='telopen' class="tel_open"></span>
											</a>
											<a href="#PP" id="linktelc" class="iconLay">
												<span title='停止通话' id='telclose' class="tel_close"></span>
											</a>
										</div>
										<div class="pControl3-g3 clearfix">
											<span class="ptext label">录像</span>
											<a href="#PP" id="linkreco" class="iconLay">
												<span title='开始录像' id='recopen' class="rec_open"></span>
											</a>
											<a href="#PP" id="linkrecc" class="iconLay">
												<span title='停止录像' id='recclose' class="rec_close"></span>
											</a>
										</div>
										<div class="pControl3-g4 clearfix">
											<span class="ptext label">抓拍</span>
											<a href="#PP" id="linkzpo" class="iconLay">
												<span class='zp_open' title='抓拍' id='zpopen'></span>
											</a>			
										</div>
									</div>
									<!--语音、通信控制结束  -->
								</div>
							  <!--云台区域信息结束 -->
							</div>
							<!--插件、及云台信息结束-->
					</div>
				</div><!--/span-->
				
				<div class="box span4" style="margin-left: 1.07%">
					<div class="box-header well" data-original-title>
						<h2><i class=""></i> 摄像头信息表</h2>
					</div>
					<div class="box-content" ">					
						<div class="form-search " style="width:100%" >
  							<input type="text" id="camKey" class=" search-query input-small pull-left" placeholder="镜头名称" />
 							<button type="button" class="btn " onclick="searchCamera()"><i class="icon-search"></i>查找</button>
 							<button type="button" class="btn " onclick="DevRefresh()"><i class="icon-refresh"></i>刷新</button>
							<a class="btn btn-info" href="#model_addCam" data-toggle="modal" data-backdrop="static"><i class="icon-plus"></i>添加</a> 						
						</div>
						<div class="zTreeBackground ">
							<ul id="treeDemo" class="ztree"></ul>
						</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<div id="rMenu" >
				<div class='arrow-left'></div>
			       <ul id="menu">
			         <!-- <li id="m_AddCam"><a href="#model_addCam" data-toggle="modal" data-backdrop="static">添加摄像头</a></li> -->
                     <li id="m_RTVideo"><a href="#" onclick="StartRTVideo(g_cameraID)">实时视频</a></li>
                     <li id="m_ShrCam"><a href="#model_shrCam" data-toggle="modal">分享摄像头</a></li>
                     <li id="m_SetRecord"><a href="#model_SetRecord" data-toggle="modal">设置终端录像</a></li>
                     <li id="m_DelShrDev"><a href="#model_cancelShare"  data-toggle="modal">删除分享</a></li>
                     <li id="m_DelDev"><a href="#model_delCam" data-toggle="modal">删除摄像头</a></li>
                    </ul>
             </div>		
			
             <!-- Modal  -->
			<div id="model_addCam" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">添加设备</h3>
			  </div>
			  <div class="modal-body">
			    <form id="form_addCam" class="form-horizontal">
  					<div class="control-group">
    					<label class="control-label" for="addDeviceID">设备ID</label>
    					<div class="controls">
      					<input type="text" name="addDeviceID" id="addDeviceID" placeholder="设备ID">
    					</div>
  					</div>
					  <div class="control-group">
					    <label class="control-label" for="addDeviceName">设备名称</label>
					    <div class="controls">
					      <input type="text" name="addDeviceName" id="addDeviceName" placeholder="镜头名称">
					    </div>
					  </div>
				</form>
			  </div>
			  <div class="modal-footer">
			   	<button class="btn btn-danger"  onclick="AddCamera()">确定</button>
			    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			  </div>
			</div>
             <!-- Modal 删除摄像头 -->
			<div id="model_delCam" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">删除设备</h3>
			  </div>
			  <div class="modal-body">
			  	<div id='modal_alert' class='alert alert-info'>
					<p>你确定要删除设备？</p>
				</div>
			  
			  </div>
			  <div class="modal-footer">
			   	<button class="btn btn-danger" data-dismiss="modal" onclick="DelCamera()">确定</button>
			    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			  </div>
			</div>
			
			<!-- Shr Cam Modal  -->
			<div id="model_shrCam" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">分享设备</h3>
			  </div>
			  <div class="modal-body">
			    <form id="form_shrCam" class="form-horizontal">
					  <div class="control-group">
					    <label class="control-label" for="shr_user_name">分享用户</label>
					    <div class="controls">
					      <input type="text" name="shr_user_name" id="shr_user_name" placeholder="用户名称">
					    </div>
					  </div>
				</form>
			  </div>
			  <div class="modal-footer">
			   	<button class="btn btn-primary"  onclick="ShrCamera()">确定</button>
			    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			  </div>
			</div>
			
			
			    <!-- Modal 取消分享 -->
			<div id="model_cancelShare" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">取消分享</h3>
			  </div>
			  <div class="modal-body">
			  	<div id='alert-message' class='alert alert-info'>
			  		选择删除分享的用户
				</div>
			  	<div id='modal_cancelShr_alert' class='alert alert-block'>
			  		
				</div>
			  	
			  </div>
			  <div class="modal-footer">
			   	<button class="btn btn-danger" onclick="CancelShare()">确定</button>
			    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			  </div>
			</div>
			
			    <!-- Modal 设置终端录像  -->
			<div id="model_SetRecord" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3 id="myModalLabel">设置终端录像 </h3>
			  </div>
			  <div class="modal-body">
			    <form id="form_SetRecord" class="form-horizontal">
  					<div class="control-group">
    					<label class="control-label" for="addDeviceID">设备ID</label>
    					<div class="controls">
      					<input type="text" name="addDeviceID" id="addDeviceID" placeholder="设备ID">
    					</div>
  					</div>
					  <div class="control-group">
					 	<div class="controls">
					    <label class="checkbox inline">
						  <input type="checkbox" id="inlineCheckbox1" value="option1"> 录像
						</label>
						<label class="checkbox inline">
						  <input type="checkbox" id="inlineCheckbox2" value="option2"> 抓拍
						</label>
					  </div>
					  	</div>
				</form>
			  </div>
			  <div class="modal-footer">
			   	<button class="btn btn-primary"  onclick="AddCamera()">设置</button>
			    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			  </div>
			 </div> 
<?php include('footer.php'); ?>

<script type="text/javascript">
<!--

$(function () {
	$("#menu-monitoring").addClass("active");
	$("#form_addCam").validate({
		rules: {
			addDeviceID: {required: true},
			addDeviceName: {required: true}
		},
		messages: {
			addDeviceID: {required: "请输入设备ID"},
			addDeviceName: {required: "请设置设备名称"}
		}
	});
	$("#form_shrCam").validate({
		rules: {shr_user_name:"required"},
		messages: {shr_user_name:"请输入分享用户名称"}
	});
	$('.modal').on('hidden', function () {
		$(".alert_add").alert("close");
		$("#player").show();
	});
	$('.modal').on('show', function () {
		$("#player").hide();
		
	});
	$('#model_cancelShare').on('shown',function(){
		GetShrUser();
	});
	DevRefresh();
	
});

function GetShrUser(){
	$("#modal_cancelShr_alert").empty();
	$.ajax({
		type: 'POST',
		url: BASE_URL+'command/check_share_user',
		dataType: 'json',
		data:{dev_id:g_selectTreeNode.id},
		success: function (data) {
			//alert(data);
			xmlDoc = loadXMLString(data);
			x=xmlDoc.getElementsByTagName("Info");
			for (var i=0;i<x.length;i++)
		  	{ 
				var devID = x[i].getAttribute("D");
				var userID = x[i].getAttribute("U");
				var userName = x[i].getAttribute("N");
				$("#modal_cancelShr_alert").append(
					"<label class='checkbox checkbox_add ' devID="+devID+
					" UserID="+userID+"><input type='checkbox'onchange='toggleCheckbox(this)'>"+
					userName+"</label>"
				);
		  	}
		},
		error: function () {
			AlertMessage("获取设备共享用户"+"操作失败","error");
		}
	});	
}

function CancelShare(){
	$("#modal_cancelShr_alert .checkbox_add").each(function(){
		if($(this).children(":checkbox").attr("checked")){
			var userName = $(this).text();
			$.ajax({
				type: 'POST',
				url: BASE_URL+'command/cancel_share',
				dataType: 'json',
				data:{dev_id:$(this).attr("devID"),shr_user:$(this).attr("UserID")},
				success: function (data) {
					if (data.errorCode == "0d") {
						AlertMessage("删除共享用户"+userName+data.errorDesc,"success");			
					}
					else
					{
						AlertMessage("删除共享用户"+userName+"失败："+data.errorDesc,"error");			
					}
				},
				error: function () {
					AlertMessage("删除共享用户"+userName+"操作失败","error");
				}
			});	
			//alert($(this).attr("devID"));
		}
	  });
}
function AddCamera(){
	//ModalPrependInfo("","alert-info");
	var valid = $("#form_addCam").valid();
	if(valid){
		//$('#model_addCam').modal('hide');
		var params = {cam_id:$("#addDeviceID").val() ,device_name:$("#addDeviceName").val()};
		$.ajax({
			type: 'POST',
			url: BASE_URL+'command/add_camera',
			dataType: 'json',
			data:params,
			success: function (data) {
				if (data.errorCode == "0d") {
					ModalPrependInfo(data.errorDesc,"alert-success");			
				}
				else
				{
					ModalPrependInfo(data.errorDesc,"alert-error");
				}
			},
			error: function () {
				ModalPrependInfo("操作失败","alert-error");
			}
		});
	}	
	
};

function ShrCamera(){
	//ModalPrependInfo("","alert-info");
	var valid = $("#form_shrCam").valid();
	if(valid){
		//$('#model_addCam').modal('hide');
		var params = {user_name:$("#shr_user_name").val() ,cam_id:g_selectTreeNode.id};
		$.ajax({
			type: 'POST',
			url: BASE_URL+'command/shr_camera',
			dataType: 'json',
			data:params,
			success: function (data) {
				if (data.errorCode == "0d") {
					ModalPrependInfo(data.errorDesc,"alert-success");			
				}
				else
				{
					ModalPrependInfo(data.errorDesc,"alert-error");
				}
			},
			error: function () {
				ModalPrependInfo("操作失败","alert-error");
			}
		});
	}	
	
};

function DelCamera(type)
{
	//alert("deleted");
	var type;
	if(g_selectTreeNode.pId == OwnListTreeID){
		type = 12;
	}
	if(g_selectTreeNode.pId == ShrListTreeID){
		type = 13;
	}
	var params = {cam_id:g_selectTreeNode.id,del_type:type};
	//alert(JSON.stringify(params));
	$.ajax({
		type: 'POST',
		url: BASE_URL+'command/del_camera',
		dataType: 'json',
		data:params,
		success: function (data) {
			if (data.errorCode == "0d") {
				AlertMessage(data.errorDesc,"success");
				//ModalPrependInfo("删除设备-"+data.errorDesc,"alert-success");			
			}
			else{
				AlertMessage(data.errorDesc,"error");
				//ModalPrependInfo("删除设备-"+data.errorDesc,"alert-error");
			}
		},
		error: function () {
			AlertMessage("操作失败","error");
			//ModalPrependInfo("操作失败","alert-error");
		}
	});
}
function ModalPrependInfo(info,type)
{
	$(".alert_add").alert("close");
	$(".modal-body").prepend(
		"<div id='modal_alert' class=' alert_add alert "+type+"'>"+
		"<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
		info+"</div>"
	);
	//$("#modal_alert").addClass(type);
	//$("#modal_alert").text(info);
}


function DevRefresh()
{
	$.ajax({
		type: 'POST',
		url: BASE_URL+'command/OwnDeviceList',
		dataType: 'json',
		data:"",
		success: function (data) {
			XMLTree(data,OwnListTreeID);
		},
		error: function () {
			AlertMessage("获取拥有设备列表"+"操作失败","error");
		}
	});
	
	$.ajax({
		type: 'POST',
		url: BASE_URL+'command/ShrDeviceList',
		dataType: 'json',
		data:"",
		success: function (data) {
			XMLTree(data,ShrListTreeID);
		},
		error: function () {
			AlertMessage("获取共享设备列表"+"操作失败","error");
			}
	});
	
}

//-->
</script>

