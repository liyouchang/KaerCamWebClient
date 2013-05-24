jQuery(document).ready(function($) {

    $('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
    });
    
    $('ul.nav li.dropdown').click(function () {
    	$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut();
    });
  //####### Menu
    $("#menu").menu();
    //$("#menu").menu("destroy");
    //ajaxify menus
	$('a.ajax-link').click(function(e){
		if( $(this).parent().hasClass('active')) return;
		var $clink=$(this);
		var addr = $clink.attr('rel');
		if(!addr) {return;}
		e.preventDefault();
		$('#loading').remove();
		//$('#content').fadeOut().parent().append('<div id="loading" class="center">Loading...<div class="center"></div></div>');
		doAjaxLoad(addr);
		//$('#content').load(addr+" #content-inner");
		//docReady();
		//$('#loading').remove();
		$('ul.main-menu li.active').removeClass('active');
		$clink.parent('li').addClass('active');	
		$clink.closest('li.dropdown').addClass('active');
		$clink.trigger('activate');
	});

	//DevRefresh();
});

function doAjaxLoad(addr)
{
	$.ajax({
		url:addr,
		dataType:"html",
		beforeSend:function(){
			//这里使用fadeout会没有效果
			$('#content').hide().parent().append('<div id="loading" class="center">Loading...<div class="center"></div></div>');
		},
		complete:function(){
			$('#loading').remove();
		},
		success:function(msg){
			
			$('#content').html(jQuery("<div>").append($.parseHTML(msg)).find('#content').html());
			docReady();
			//sleep(2000);
			//$('#loading').remove();
			$('#content').fadeIn();
		}
	});
}

function XMLTree(data,pid)
{
	var xmlDoc = loadXMLString(data);
	var x=xmlDoc.getElementsByTagName("Info");
	var treeObj = $.fn.zTree.getZTreeObj("treeDemo");	
	var parentNode = treeObj.getNodeByParam("id", pid, null);
	treeObj.removeChildNodes(parentNode);
	for (var i=0;i<x.length;i++)
  	{ 
		var NodeName = x[i].getAttribute("N");
		var NodeID = x[i].getAttribute("ID");
		var online = x[i].getAttribute("S");
		//var mac = x[i].getAttribute("D");
		var icon = (online==1)?"encoder":"encoderOffline";
		var newNode = {id:NodeID, pId:pid, name:NodeName, status:online, iconSkin:icon};
		treeObj.addNodes(parentNode,newNode);
  	}
	
}
function changeAlertMsg(info,error)
{
	$("#alert-message").removeClass("alert-info alert-error alert-success");
	//$("#login-info").removeClass();
	//$("#login-info").addClass("alert center");
	$("#alert-message").addClass(error);
	$("#alert-message").text(info);
}
function AlertMessage(info,type)
{
	$.globalMessenger().post({ 
		message: info,
	    type: type,
	    showCloseButton: true
	    });
   
}
function toggleCheckbox(element)
{
	$(element).attr("checked",element.checked);
	$(element).val(1);
  //element.checked = !element.checked;
}

//播放视频
function StartRTVideo(cameraID)
{
	var player = document.getElementById("player");
	if(player == null)
	{
		AlertMessage("播放插件未安装","info");
		return false;
	}
	var ret = player.StartRealTimeVideo(cameraID);
	var obj = JSON.parse(ret);
	if(obj.retValue != 13){
		AlertMessage("开始实时视频失败，"+obj.retDes,"error");
		return false;
	}
	SetControlPTZ(1);
	AlertMessage("开始实时视频成功","success");
	return true;
		
}
