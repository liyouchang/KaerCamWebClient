var setting = {
	data : {
		simpleData : {
			enable : true
		}
	},
	view : {
		// fontCss: getFontCss,
		selectedMulti : true
	},
	callback : {
		onDblClick : zTreeOnDblClick
	}

};
// 双击节点打开视频
function zTreeOnDblClick(event, treeId, treeNode) {
	//alert(treeNode ? treeNode.tId + ", " + treeNode.name : "isRoot");
	if(treeNode){
		var isParent = treeNode.isParent;
		if (!isParent) {
			StartRTVideo(treeNode.id);
		}
	}
	
};

var zNodes = [ 
               {id : 1,pId : 0,name : "江苏公安",open : true,iconSkin : "home"}, 
               {id : 11,pId : 1,name : "威海食品",iconSkin : "home"},
               {id : 111,pId : 11,name : "encoder1111111111",iconSkin : "encoder"}, 
               {
	id : 1112,
	pId : 111,
	name : "encoder1111111111",
	iconSkin : "encoder"
}, {
	id : 11121,
	pId : 1112,
	name : "encoder1111111111",
	iconSkin : "encoder"
}, {
	id : 111211,
	pId : 11121,
	name : "encoder1111111111",
	iconSkin : "encoder"
}, {
	id : 1112111,
	pId : 111211,
	name : "encoder1111111111",
	iconSkin : "encoder"
}, {
	id : 11121111,
	pId : 1112111,
	name : "encoder1111111dddffsdfs31231231231231231231231331213212111",
	iconSkin : "encoder"
}, {
	id : 1111,
	pId : 111,
	name : "camera",
	iconSkin : "camera"
}, {
	id : 39425,
	pId : 11,
	name : "大门高清",
	iconSkin : "camera"
}, {
	id : 306945,
	pId : 11,
	name : "西安中心机房",
	iconSkin : "camera"
}, {
	id : 12,
	pId : 1,
	name : "测试",
	iconSkin : "home"
}, {
	id : 121,
	pId : 12,
	name : "测试1",
	iconSkin : "home"
}, {
	id : 1211,
	pId : 121,
	name : "测试11",
	iconSkin : "home"
}, {
	id : 12111,
	pId : 1211,
	name : "encoder11",
	iconSkin : "encoder"
}, {
	id : 121111,
	pId : 12111,
	name : "camera1",
	iconSkin : "camera"
}, {
	id : 121112,
	pId : 12111,
	name : "camera1",
	iconSkin : "camera"
}, {
	id : 1212,
	pId : 121,
	name : "测试12",
	iconSkin : "home"
}, {
	id : 12121,
	pId : 1212,
	name : "encoder1",
	iconSkin : "encoder"
}, {
	id : 122,
	pId : 12,
	name : "encoder1",
	iconSkin : "encoder"
}, {
	id : 1111,
	pId : 111,
	name : "camera1",
	iconSkin : "camera"
}, {
	id : 112,
	pId : 12,
	name : "encoder2",
	iconSkin : "encoderOffline"
}, {
	id : 182785,
	pId : 11,
	name : "西安测试",
	iconSkin : "camera"
},

];

var nodeList = [];
var lastValue = "";

// 查询节点，选中查询到的节点
function searchCamera() {
	var zTree = $.fn.zTree.getZTreeObj("treeDemo");
	var keyType = "name";
	var value = $.trim($("#camKey").get(0).value);
	// if (lastValue === value) return;
	// lastValue = value;

	if (value === "") {
		// zTree.cancelSelectedNode();
		return;
	}

	// updateNodes(false);
	nodeList = zTree.getNodesByParamFuzzy(keyType, value);

	zTree.cancelSelectedNode();
	// zTree.expandAll(false);
	for ( var i = 0, l = nodeList.length; i < l; i++) {
		// nodeList[i].highlight = highlight;
		// zTree.updateNode(nodeList[i]);
		zTree.selectNode(nodeList[i], true);
	}
}

// camera control pannel functions
function MM_swapImgRestore(id, cs1, cs2) {
	if ($("#" + id).hasClass(cs2)) {
		$("#" + id).removeClass(cs2);
	}
	if (!$("#" + id).hasClass(cs1)) {
		$("#" + id).addClass(cs1);
	}
}
function MM_swapImage(id, cs1, cs2) {
	if ($("#" + id).hasClass(cs1)) {
		$("#" + id).removeClass(cs1);
	}
	if (!$("#" + id).hasClass(cs2)) {
		$("#" + id).addClass(cs2);
	}
}
// 控制带云台操作的播放窗口的展示
function advancedOption() {
	if ($("#advancedoption").css("display") == "none") {
		$("#advancedoption").css("display", "block");
		// $("#controlAdvancedIcon").css("class","active icon icon-color
		// icon-arrowstop-n");
		$("#hidemore").text('收起更多操作');
	} else {
		$("#advancedoption").css("display", "none");
		// $("#controlAdvancedIcon").css("class","active icon icon-color
		// icon-arrowstop-s");
		$("#hidemore").text('展开更多操作');
	}
}

function ViewTree(bView) {
	var player = document.getElementById("player");

	if ($("#viewTree").text() == "显示树形列表") {

		$("#viewTree").text("隐藏树形列表");
		player.IsViewTree(1);
	} else {
		$("#viewTree").text("显示树形列表");
		player.IsViewTree(0);
	}
}

function setDivMode(value) {
	var player = document.getElementById("player");
	player.SetDivision(value);
	return false;
}

// 成功登录标记
var login = false;
// 是否安装插件
var hasplug = true;

// 页面初始化插件对象,适合多浏览器支持
function initObject1() {
	var result = false;
	if ($.browser.msie) {browseFlag = 1;} 
	else if ($.browser.safari) {browseFlag = 2;}
	else if ($.browser.mozilla) {browseFlag = 2;}
	else if ($.browser.opera) {browseFlag = 2;}
	else if ($.browser.chrome) {	browseFlag = 2;}
	else {	browseFlag = 2;}
	
	// 如果是ie
	if (browseFlag == 1) {
		// $("#movie1").append("<OBJECT id='player'
		// CLASSID=\"clsid:9E89FD56-D8A5-4E04-97DF-8C4D670CAE74\" width=100%
		// height=100%></OBJECT>");
		$("#movie1").append("<OBJECT id='player' " +
				"CLASSID=\"clsid:F4418F4B-4A6B-4A93-948F-332025F395E8\" " +
				"width=100% height=100%></OBJECT>");
		// if(DetectActiveX())
		// {
		result = true;
		// }else
		// {
		// result=false;
		// }
	} else {
		result = false;
	}
	return result;
}
//播放视频
function StartRTVideo(cameraID)
{
	var player = document.getElementById("player");
	if(player == null)
	{
		return false;
	}
	var videoID = cameraID / 256;
	var channelNo = cameraID % 256;
	var ret = player.StartRealTimeVideo(videoID, channelNo);
	var obj = eval("(" + ret + ")");
	if(obj.retValue != 0){
		return false;
	}
	SetControlPTZ(1);
	return true;
		
}
// 登录播放插件
function loginServer() {
	var player = document.getElementById("player");
	if(player == null)
	{
		return false;
	}
	// player.WebClose();
	//var IVS_IP = "192.168.0.8";
	var IVS_IP = "192.168.2.247";
	var IVS_User = $.cookie('UserName'), IVS_Psw = $.cookie('Password');
	var retStr = player.LoginServer(IVS_User, IVS_Psw, IVS_IP);
	var obj = eval ("(" + retStr + ")");
	if (obj.retValue == 0) {
		login = true;
		$("#infoText").text("登录成功");
	} else {
		login = false;
		$("#infoText").text("登陆失败"+obj.retDes);
	}
}
function initPlusgin() {
	if (initObject1()) {
		loginServer();
	} else {// 未安装插件提示
		hasplug = false;
		$("#infoText").text("监控插件未安装！");
	}
	advancedOption();
	
	$.fn.zTree.init($("#treeDemo"), setting, zNodes);
}

$(document).ready(function() {
	
});

function DetectActiveX() {
	try {
		var comActiveX = new ActiveXObject("Ke2008WebProj1.Ke2008Web");
	} catch (e) {
		return false;
	}
	return true;
}

// 退出时先注销插件
function logout() {
	if (!hasplug) {
		// document.URL = "/cwmp/logout.jsp";
	} else {
		if (login == true) {
			var player = document.getElementById("player");
			player.LogOut();

		} else {
			$("#infoText").text("插件正在登录，请稍后再试 ");
		}
	}
}

//判断元素是否绑定了事件
function isBindEvent(id,event)
{
	
	//var tempE = $("#"+id).data("events");
	var tempE = $.data(("#"+id),"events");
	
	if(tempE)
	{
		if(tempE[event])
		{
			return true;
		} else
		{
			return false;
		}
	} else
	{
		return false;
	}
}

function SnapPic(camID)
{
	var player = document.getElementById("player");
	if(player == null)
	{
		return false;
	}
	var ret = player.TakeSnapshot(camID);
	var obj = eval("("+ret+")");
	if (obj.retValue == 0) {
		$("#infoText").text("抓拍成功："+ obj.filePath);
	} else {
		$("#infoText").text("抓拍失败"+obj.retDes);
	}

	return true;
}
function ControlPTZ(cmd,speed,data)
{
	var player = document.getElementById("player");
	if(player == null)
	{
		return false;
	}
	player.ControlPTZ(0,cmd,speed,data);
	return true;
}

//控制云台、聚焦、步长等
function SetControlPTZ(flag) {
	if (flag == 0) {
		if (g_enablePannel == 0) {
			return;
		}
		g_enablePannel = 0;
		MM_swapImage("direction02", "direction_02", "udirection_02");
		$("#linkDir02").unbind("mousedown");
		$("#linkDir02").unbind("mouseup");

		MM_swapImage("direction04", "direction_04", "udirection_04");
		$("#linkDir04").unbind("mousedown");
		$("#linkDir04").unbind("mouseup");

		MM_swapImage("direction05", "direction_05", "udirection_05");
		$("#direction05").unbind("click");

		MM_swapImage("direction06", "direction_06", "udirection_06");
		$("#linkDir06").unbind("mousedown");
		$("#linkDir06").unbind("mouseup");

		MM_swapImage("direction08", "direction_08", "udirection_08");
		$("#linkDir08").unbind("mousedown");
		$("#linkDir08").unbind("mouseup");

		MM_swapImage("iconforcus", "icon_forcus", "uicon_forcus");
		$("#iconforcus").unbind("click");

		MM_swapImage("iconreduce", "icon_reduce", "uicon_reduce");
		$("#linkiconr").unbind("click");

		MM_swapImage("iconadd", "icon_add", "uicon_add");
		$("#linkicona").unbind("click");

		MM_swapImage("iconquan", "icon_quan", "uicon_quan");
		$("#iconquan").unbind("click");

		MM_swapImage("iconreducequan", "icon_reduce", "uicon_reduce");
		$("#linkiconrq").unbind("mousedown");
		$("#linkiconrq").unbind("mouseup");

		MM_swapImage("iconaddquan", "icon_add", "uicon_add");
		$("#linkiconaq").unbind("mousedown");
		$("#linkiconaq").unbind("mouseup");

		MM_swapImage("iconreducefocus", "icon_reduce", "uicon_reduce");
		$("#linkiconrz").unbind("mousedown");
		$("#linkiconrz").unbind("mouseup");

		MM_swapImage("iconaddfocus", "icon_add", "uicon_add");
		$("#linkiconaz").unbind("mousedown");
		$("#linkiconaz").unbind("mouseup");

		MM_swapImage("iconfocus", "icon_zoom", "uicon_zoom");
		$("#iconfocus").unbind("click");

		MM_swapImage("stepsatus","step_status_"+g_speed,"ustep_status_"+g_speed);
		MM_swapImage("linkbtnl", "btn_large_on", "ubtn_large_on");
		$("#linkbtnl").unbind("click");
		MM_swapImage("linkbtns", "btn_small_on", "ubtn_small_on");
		$("#linkbtns").unbind("click");
		
		//控制语音通讯
		MM_swapImage("telopen","tel_open","utel_open");
		$("#linktelo").unbind("click");
		MM_swapImage("telclose","tel_close","utel_close");
		$("#linktelc").unbind("click");
		//控制广播
		MM_swapImage("boardopen","board_open","uboard_open");
		$("#linkboardo").unbind("click");
		MM_swapImage("boardclose","board_close","uboard_close");
		$("#linkboardc").unbind("click");
		//控制录像
		MM_swapImage("recopen","rec_open","urec_open");
		$("#linkreco").unbind("click");
		MM_swapImage("recclose","rec_close","urec_close");
		$("#linkrecc").unbind("click");
		
		//抓拍
		MM_swapImage("zpopen","zp_open","uzp_open");
		$("#zpopen").unbind("click");
		
	} else {
		if (g_enablePannel == 1) {
			return;
		}
		g_enablePannel = 1;
		// up
		MM_swapImgRestore("direction02", "direction_02", "udirection_02");
		$("#linkDir02").mousedown(function() {
			var speed = g_speed * 62 / 5 + 1;// 1~63
			ControlPTZ(0, speed, speed);
		});
		$("#linkDir02").mouseup(function() {
			ControlPTZ(19, 0, 0);
		});
		
		// left
		MM_swapImgRestore("direction04", "direction_04", "udirection_04");
		$("#linkDir04").mousedown(function() {
			var speed = g_speed * 62 / 5 + 1;// 1~63
			ControlPTZ(2, speed, speed);
		});
		$("#linkDir04").mouseup(function() {
			ControlPTZ(19, 0, 0);
		});

		// Right
		MM_swapImgRestore("direction06", "direction_06", "udirection_06");
		$("#linkDir06").click(function() {
			var speed = g_speed * 62 / 5 + 1;// 1~63
			ControlPTZ(3, speed, speed);
		});
		$("#linkDir06").mouseup(function() {
			ControlPTZ(19, 0, 0);
		});

		// down
		MM_swapImgRestore("direction08", "direction_08", "udirection_08");
		$("#linkDir08").mousedown(function() {
			var speed = g_speed * 62 / 5 + 1;// 1~63
			ControlPTZ(1, speed, speed);
		});
		$("#linkDir08").mouseup(function() {
			ControlPTZ(19, 0, 0);
		});

		// auto自动云台
		MM_swapImgRestore("direction05", "direction_05", "udirection_05");
		$("#linkDir05").mousedown(function() {
			AutoYuntai();
		});

		// 光圈
		MM_swapImgRestore("iconforcus", "icon_forcus", "uicon_forcus");
		MM_swapImgRestore("iconreduce", "icon_reduce", "uicon_reduce");
		$("#linkiconr").click(function() {
			ControlPTZ(5, 0, 0);
		});
		MM_swapImgRestore("iconadd", "icon_add", "uicon_add");
		$("#linkicona").click(function() {
			ControlPTZ(4, 0, 0);
		});

		// 焦距
		MM_swapImgRestore("iconquan", "icon_quan", "uicon_quan");
		MM_swapImgRestore("iconreducequan", "icon_reduce", "uicon_reduce");
		$("#linkiconrq").click(function() {
			ControlPTZ(7, 0, 0);
		});
		MM_swapImgRestore("iconaddquan", "icon_add", "uicon_add");
		$("#linkiconaq").click(function() {
			ControlPTZ(6, 0, 0);
		});

		// 变倍
		MM_swapImgRestore("iconfocus", "icon_zoom", "uicon_zoom");
		MM_swapImgRestore("iconreducefocus", "icon_reduce", "uicon_reduce");
		$("#linkiconrz").click(function() {
			ControlPTZ(8, 0, 0);
		});
		MM_swapImgRestore("iconaddfocus", "icon_add", "uicon_add");
		$("#linkiconaz").click(function() {
			ControlPTZ(9, 0, 0);
		});

		// 步长
		MM_swapImgRestore("linkbtns", "btn_small_on", "ubtn_small_on");
		$("#linkbtns").click(function() {
			if (g_speed < 1) {
				$("#stepsatus").removeClass("step_status_none tupian");
			} else {
				$("#stepsatus").removeClass("step_status" + "_" + g_speed + " tupian");
			}
			g_speed--;
			if (g_speed < 1) {
				g_speed = 0;
				$("#stepsatus").addClass("step_status_none tupian");
			} else {
				$("#stepsatus").addClass("step_status" + "_" + g_speed + " tupian");
			}
		});
		MM_swapImgRestore("stepsatus","step_status_"+g_speed,"ustep_status_"+g_speed);
		MM_swapImgRestore("linkbtnl", "btn_large_on", "ubtn_large_on");
		$("#linkbtnl").click(function() {
			if (g_speed < 1) {
				$("#stepsatus").removeClass("step_status_none tupian");
			} else {
				if (g_speed > 5) {g_speed = 5;}
				$("#stepsatus").removeClass("step_status" + "_" + g_speed + " tupian");
			}
			g_speed++;
			if (g_speed > 5) {g_speed = 5;}
			$("#stepsatus").addClass("step_status" + "_" + g_speed + " tupian");
		});
		
		//控制语音通讯
		MM_swapImgRestore("telopen","tel_open","utel_open");
		$("#linktelo").click(function(){});
		MM_swapImgRestore("telclose","tel_close","utel_close");
		$("#linktelc").click(function(){});
		
		//控制广播
		MM_swapImgRestore("boardopen","board_open","uboard_open");
		$("#linkboardo").click(function(){});
		MM_swapImgRestore("boardclose","board_close","uboard_close");
		$("#linkboardc").click(function(){});
		
		//控制录像
		MM_swapImgRestore("recopen","rec_open","urec_open");
		$("#linkreco").click(function(){});
		MM_swapImgRestore("recclose","rec_close","urec_close");
		$("#linkrecc").click(function(){});
		
		//抓拍
		MM_swapImgRestore("zpopen","zp_open","uzp_open");
		$("#zpopen").click(function(){
			SnapPic(0);
		});
		
	}
}

 
function AutoYuntai()
{
	if(g_AutoYuntai==0)
	{
		g_AutoYuntai = 1;
		ControlPTZ(27,10,10);
		ControlPTZ(28,10,10);
		ControlPTZ(29,10,10);
	}
	else
	{
		ControlPTZ(2,10,10);
		ControlPTZ(19,0,0);
		g_AutoYuntai = 0;
	}
}
function CamStatusCheck(info)
{
	var statusObj = eval("(" + info + ")");
	g_cameraID = statusObj.cameraID;
	switch(statusObj.reportType)
	{
	case 1://镜头选择
		
		if(g_cameraID == 0)
			SetControlPTZ(0);
		else
			SetControlPTZ(1);
		break;
	case 2://视频停止
		SetControlPTZ(0);
		break;
	}
}
//全局变量
var g_AutoYuntai = 0;
var g_cameraID;
var g_speed = 1;
var g_enablePannel = 0;