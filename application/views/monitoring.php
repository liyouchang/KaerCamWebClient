<?php include('header.php'); ?>

<script type="text/javascript">

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
		   // player.LogOut();
		   
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
							
									 <div class="screen" id="screen">
										<span class="screen1" onClick="javascript:setDivMode(1)" ></span>
										<span class="screen4" onClick="javascript:setDivMode(4)" ></span>
										<span class="screen6" onClick="javascript:setDivMode(6)" ></span>
										<span class="screen8" onClick="javascript:setDivMode(8)" ></span>
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
