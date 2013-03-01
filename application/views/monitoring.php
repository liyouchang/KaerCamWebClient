<?php include('header.php'); ?>

<script type="text/javascript">


var setting = {
	data: {
		simpleData: {
			enable: true
		}
	},
	view: {
		//fontCss: getFontCss,
		selectedMulti: true
	},
	callback: {
		onDblClick: zTreeOnDblClick
	}
			
};
function zTreeOnDblClick(event, treeId, treeNode) {
	if(!treeNode.isParent)
	{
    	alert(treeNode ? treeNode.tId + ", " + treeNode.name : "isRoot");
	}
};
				
		
var zNodes =[
	{ id:1, pId:0, name:"江苏公安", open:true, iconSkin:"home"},
	{ id:11, pId:1, name:"威海食品", iconSkin:"home"},
	{ id:111, pId:11, name:"encoder1111111111", iconSkin:"encoder"},
	{ id:1112, pId:111, name:"encoder1111111111", iconSkin:"encoder"},
	{ id:11121, pId:1112, name:"encoder1111111111", iconSkin:"encoder"},
	{ id:111211, pId:11121, name:"encoder1111111111", iconSkin:"encoder"},
	{ id:1112111, pId:111211, name:"encoder1111111111", iconSkin:"encoder"},
	{ id:11121111, pId:1112111, name:"encoder1111111dddffsdfs31231231231231231231231331213212111", iconSkin:"encoder"},
	{ id:1111,pId:111,name:"camera",iconSkin:"camera"},
	{ id:112, pId:11, name:"encoder2", iconSkin:"encoderOffline"},
	{ id:1121,pId:112,name:"camera",iconSkin:"camera"},
	{ id:12, pId:1, name:"测试", iconSkin:"home"},
	{ id:121, pId:12, name:"测试1", iconSkin:"home"},
	{ id:1211, pId:121, name:"测试11", iconSkin:"home"},
	{ id:12111, pId:1211, name:"encoder11", iconSkin:"encoder"},
	{ id:121111,pId:12111,name:"camera1",iconSkin:"camera"},
	{ id:121112,pId:12111,name:"camera1",iconSkin:"camera"},
	{ id:1212, pId:121, name:"测试12", iconSkin:"home"},
	{ id:12121, pId:1212, name:"encoder1", iconSkin:"encoder"},
	{ id:122, pId:12, name:"encoder1", iconSkin:"encoder"},
	{ id:1111,pId:111,name:"camera1",iconSkin:"camera"},
	{ id:112, pId:12, name:"encoder2", iconSkin:"encoderOffline"},
	{ id:1121,pId:112,name:"camera2",iconSkin:"camera"},

];
		
var nodeList = [];
var lastValue = "";
		
//查询节点，选中查询到的节点
function searchCamera() {
	var zTree = $.fn.zTree.getZTreeObj("treeDemo");
	var keyType = "name";
	var value = $.trim( $("#camKey").get(0).value);
	//if (lastValue === value) return;
	//lastValue = value;
	
	if (value === "") 
	{
		//zTree.cancelSelectedNode();
		return;
	}
	
	//updateNodes(false);
	nodeList = zTree.getNodesByParamFuzzy(keyType, value);
			
	zTree.cancelSelectedNode();
	//zTree.expandAll(false);
	for( var i=0, l=nodeList.length; i<l; i++) {
		//nodeList[i].highlight = highlight;
		//zTree.updateNode(nodeList[i]);
		zTree.selectNode(nodeList[i],true );
	}
}


		
//camera control pannel functions

function MM_swapImgRestore(id,cs1,cs2)
{
	if($("#"+id).hasClass(cs2))
	{
		$("#"+id).removeClass(cs2);
	}
	if(!$("#"+id).hasClass(cs1))
	{
		$("#"+id).addClass(cs1);
	}
}
function MM_swapImage(id,cs1,cs2)
{
	if($("#"+id).hasClass(cs1))
	{
		$("#"+id).removeClass(cs1);
	}
	if(!$("#"+id).hasClass(cs2))
	{
		$("#"+id).addClass(cs2);
	}
}
//控制带云台操作的播放窗口的展示
function advancedOption()
{
	if($("#advancedoption").css("display")=="none")
	{
		$("#advancedoption").css("display","block");
		//$("#controlAdvancedIcon").css("class","active icon icon-color icon-arrowstop-n");
		$("#hidemore").text('收起更多操作');
	}
	else
	{		
		$("#advancedoption").css("display","none");
		//$("#controlAdvancedIcon").css("class","active icon icon-color icon-arrowstop-s");
		$("#hidemore").text('展开更多操作');
	}
}

function ViewTree(bView)
{
	var player = document.getElementById("player");
	
	if($("#viewTree").text()=="显示树形列表")
	{
		
		$("#viewTree").text("隐藏树形列表");
		player.IsViewTree(1);
	}else
	{
		$("#viewTree").text("显示树形列表");
		player.IsViewTree(0);
	} 
}

function setDivMode(value)
{
	var player = document.getElementById("player");
	player.Splitscreen(value);
	return false;
}


//成功登录标记
var login=false;
//是否安装插件
var hasplug=true;
			
//页面初始化插件对象,适合多浏览器支持
function initObject1()
{
	var result=false;

	 if($.browser.msie) {
	      browseFlag = 1;
	   }
	   else if($.browser.safari)
	   {
	     browseFlag = 2;
	    }
	   else if($.browser.mozilla)
	   {
	      browseFlag = 2;
	    }
	   else if($.browser.opera)
	     {
	        browseFlag = 2;
	    }
	   else if($.browser.chrome)
	     {
	        browseFlag = 2;
	    }
	   else
	   {
	           browseFlag = 2 ;
	      }
	    //如果是ie
	  if(browseFlag == 1)
	  {
  		$("#movie1").append("<OBJECT id='player' CLASSID=\"clsid:9E89FD56-D8A5-4E04-97DF-8C4D670CAE74\" width=100% height=100%></OBJECT>");
  		//if(DetectActiveX())
  	    //{
  	      result=true;
  	   // }else
  	   // {
  	  //    result=false;
  	   // }
	  }
	  else
	  {
		  result=false;
	  }
  return result;
}

//登录播放插件
function loginplug()
{
	var player = document.getElementById("player");
	//player.WebClose();
	var IVS_IP = "192.168.2.247",IVS_User = $.cookie('UserName'),IVS_Psw = $.cookie('Password');
 	var lRet = 0;
	player.WebLogin(IVS_User,IVS_Psw,IVS_IP,lRet);
	lRet=player.IsLogin;
  	if(lRet==0){
  	  login=true;
  	  $("#infoText").text("登录成功");
  	} else{
  		login=false;
  	 	$("#infoText").text("登陆失败,errorCode="+lRet);
  	}
}
$(document).ready(function(){
	$.fn.zTree.init($("#treeDemo"), setting, zNodes);

	if(initObject1())
	{
		loginplug();
	}
	else
	{// 未安装插件提示
		hasplug=false;
		$("#infoText").text("监控插件未安装！");
	}
	advancedOption();
});

function DetectActiveX()
{
	   try
	   {
	      var comActiveX = new ActiveXObject("Ke2008WebProj1.Ke2008Web");   
	   }
	   catch(e)
	   {
		      return false;
	   }
	    return true;
}

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
		    player.LogOut();
		   
		}else
		{
			$("#infoText").text("插件正在登录，请稍后再试 ");
		}
	}
}

// 关闭页面时，调登出接口
$(window).unload( function () {logout(); } );

</script>

<style type="text/css">

</style>

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
			<div class="row-fluid ">	
				<div class="box span9">
					<div class="box-header well" data-original-title>
						<h2>视频窗口</h2>
						<div class="box-icon">
						<!-- 	<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> -->
						</div>
					</div>
					
					<div class="box-content span11">
						 
							<!--插件、及云台信息开始-->
							<!-- 插件定义开始 -->
							<div id="movie1" class="center" style="WIDTH: 750px; HEIGHT: 500px;"></div> 
							<!-- 插件定义结束 -->		
												
							<div id="" class=" box " >
								<!-- 控制更多操作开始 -->
								<div class="controlH clearfix">
									<a class="btn btn-small" id="hidemore" onClick="javascript:advancedOption()">
									<!-- <span class="active icon icon-color icon-arrowstop-n" id="controlAdvancedIcon"></span> --> 
									 收起更多操作</a>
									<a class="btn btn-small" id="viewTree" onclick="ViewTree()" >
									显示树形列表</a>
									 <div class="screen" id="screen">
										<span class="screen1" onClick="javascript:setDivMode(1)" ></span>
										<span class="screen4" onClick="javascript:setDivMode(4)" ></span>
										<span class="screen6" onClick="javascript:setDivMode(6)" ></span>
										<span class="screen8" onClick="javascript:setDivMode(9)" ></span>
									</div>
									<span class="pull-right " style="margin-right:5px">
										
									<i class="icon-exclamation-sign "></i><span id="infoText" class="label label-info">
									操作成功</span>
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
											<span  title='锁定' id='direction05' class="direction_05"></span>
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
											<span title='自动' id='iconforcus' class="iconLay icon_forcus"></span>
											<a href="#PP" id="linkiconr" class="iconLay "> 
												<span title='减小' id='iconreduce' class="icon_reduce"></span>
											</a>
											<a href="#PP" id="linkicona" class="iconLay">
												<span title='增大' id='iconadd' class="icon_add"></span>
											</a>
										</div>
										<div class="pControl2-g2 clearfix">
											<span class="ptext label">焦距</span>
											<span title='自动' id='iconquan' class="iconLay icon_quan"></span>
											<a href="#PP" id="linkiconrq" class="iconLay">
												<span title='拉近' id='iconreducequan' class="icon_reduce"></span>
											</a>
											<a href="#PP" id="linkiconaq" class="iconLay">
												<span title='拉远' id='iconaddquan' class="icon_add"></span>
											</a>
										</div>
										<div class="pControl2-g3 clearfix">
											<span class="ptext label">聚焦</span>
											<span title='自动' id='iconfocus' class="iconLay icon_zoom"></span>
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
											<span class="ptext label">广播</span>
											<a href="#PP" id="linkboardo" class="iconLay"> 
												<span title='广播' id='boardopen' class="board_open"></span>
											</a>
											<a href="#PP" id="linkboardc" class="iconLay">
												<span title='停止广播' id='boardclose' class="board_close"></span>
											</a>
										</div>
										<div class="pControl3-g2 clearfix">
											<span class="ptext label">通讯</span>
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
											<a href="#PP" id="linkzpo" onClick="cmdCapPicEx()" class="iconLay">
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
				
				<div class="box span3" style="margin-left: 1.07%">
					<div class="box-header well" data-original-title>
						<h2><i class=""></i> 摄像头信息表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
					
						<div class="form-search " style="width:220px" >
  							<input type="text" id="camKey" class=" search-query input-small " placeholder="镜头名称" />
 							<button type="button" class="btn " onclick="searchCamera()"><i class="icon-search"></i>查找</button>
						</div>
						
						<div class="zTreeBackground ">
							<ul id="treeDemo" class="ztree"></ul>
						</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			

			
    
<?php include('footer.php'); ?>
