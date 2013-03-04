<!DOCTYPE html>
<html lang="zh">
<head>

	<meta charset="utf-8">
	<title><?php echo $title?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Kaer web camera client system.">
	<meta name="author" content="lihaote">

	<!-- The styles -->
	<!-- <link id="bs-css" href="<?php echo base_url('css/bootstrap-cerulean.css') ?>" rel="stylesheet">  -->
	<link href='<?php echo base_url('css/bootstrap-my.css') ?>' rel='stylesheet'>

	<link href="<?php echo base_url('css/jquery-ui-1.10.1.custom.css')?>" rel="stylesheet">
	<link href='<?php echo base_url('css/opa-icons.css')?>' rel='stylesheet'>
	<link href='<?php echo base_url('css/jquery-ui-timepicker-addon.css') ?>' rel='stylesheet'>
	<link href='<?php echo base_url('css/zTreeStyle.css') ?>' rel='stylesheet'>
	<link href='<?php echo base_url('css/tupian.css') ?>' rel='stylesheet'>
	<link href='<?php echo base_url('css/mystyle.css') ?>' rel='stylesheet'>
	<link href="<?php echo base_url('css/myapp.css')?>" rel="stylesheet">

<link href="<?php echo base_url('css/bootstrap-responsive.css') ?>" rel="stylesheet"> 
	
	<script type="text/javascript">SITE_URL = "<?php echo site_url() ?>";BASE_URL = "<?php echo base_url()?>";</script>
	
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if lt IE 6]>
		<script type="text/javascript" src="<?php echo base_url('js/css3-mediaqueries.js') ?>" ></script>
	<![endif]-->
	
	<!-- jQuery -->
	<script src="<?php echo base_url('js/jquery-1.9.1.js')?>"></script>
	<script src="<?php echo base_url('js/jquery.mb.browser.js')?>"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url('js/jquery-ui-1.10.1.custom.js')?>"></script>
		<!-- zTree form -->
	<script src="<?php echo base_url('js/jquery.ztree.core-3.5.js') ?>"></script> 
		<script src="<?php echo base_url('js/jquery.cookie.js')?>"></script>
	<script src="<?php echo base_url('js/jquery.hotkeys.js')?>"></script>
	
	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo base_url('img/favicon.ico')?>">
		
</head>

<body >
	<?php if((!isset($no_visible_elements) || !$no_visible_elements) )	{ ?>
	<!-- topbar starts -->
	<div class="navbar " id="main-navbar">
		<div class="navbar-inner" >
			<div class="container-fluid">
			
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				 
				<a class="brand logo" href="<?php echo base_url('start/home')?>"> <img alt="Logo" src="<?php echo base_url('img/logo20.png')?>" /> <span>视频监控系统</span></a>
				
				<!-- user dropdown starts -->
				
				<div class="btn-group pull-right usermenu" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					
						<!-- <li><a href="#">用户账户</a></li>  
						<li class="divider"></li>-->
						<li><a href="<?php  echo base_url('login/logout')?>">退出</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid" >
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 " style="margin-left: 0%;">
				<div class=" well nav  nav-collapse sidebar-nav ">
					<ul class=" nav nav-tabs nav-stacked main-menu ">
						<li class=" nav-header hidden-tablet">视频监控功能</li>
						<li ><a class="ajax-link" rel="home"><i class="icon-home"></i><span class="hidden-tablet"> 功能列表</span></a></li>
						<li><a class="ajax-link" rel="monitoring"><i class="icon-facetime-video"></i><span class="hidden-tablet"> 实时监控</span></a></li>
						<li><a class="ajax-link" rel="record_view"><i class="icon-film"></i><span class="hidden-tablet"> 录像播放</span></a></li>
						<li><a class="ajax-link" rel="alarms_query"><i class="icon-list-alt"></i><span class="hidden-tablet"> 告警查询</span></a></li>
	
						<li><a class="ajax-link" rel="snap_gallery"><i class="icon-camera"></i><span class="hidden-tablet"> 快照查询</span></a></li>
						<li class=" nav-header hidden-tablet">其他功能</li>
						<!-- <li><a class="" href="home"><i class="icon-user"></i><span class="hidden-tablet"> 账户设置</span></a></li> -->
						<li><a class="ajax-link" rel="sys_config"><i class="icon-cog"></i><span class="hidden-tablet"> 系统配置</span></a></li>

						<li><a class="" href=<?php  echo base_url("login/logout")?> ><i class="icon-lock"></i><span class="hidden-tablet"> 退出系统</span></a></li>
					</ul>
					 
					<!-- <label  id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input  id="is-ajax" type="checkbox"> Ajax on menu</label> -->
				</div><!--/.well -->
			</div><!--/span-->
		

			<div id="content" class="span10 pull-left">
			 
			<div id="content-inner" >
			
			<!-- content starts -->
			<?php } ?>
