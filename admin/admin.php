<?php 
	require 'ham.php';
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	ob_start();
	if(isset($_GET['option']))
	{
		$option = $_GET['option'];
	}else {
		$option ="";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="menu/csshorizontalmenu.css" />
<script type="text/javascript" src="menu/csshorizontalmenu.js">
</script>
<link href="/joomla/installation/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style/style.css" rel="stylesheet"/>
<title>TRANG QUẢNG TRỊ</title>
</head>
<body>
<div id="swapper-w">
<div id="swapper">
	<div id="loichao">
		<div id="loichaoadmin">
			Chào Mừng <span style='color: rgb(224, 0, 0);'><?php echo $_SESSION['currUser'];?></span> đến với trang quảng trị 
			<a href="logout.php" style="-webkit-appearance: push-button;padding: 0 8px 0 8px;">logout</a>
		</div>
	</div>
	<div id="header">
		
		<div id="banner"><img src="img/banner.jpg" width="1024px" height="121px"></div>
		<div class="horizontalcssmenu">
			<ul id="cssmenu1">
			<li style="border-left: 1px solid #202020;"><a href="admin.php">Trang Chủ</a></li>
			<li><a href="?option=hethong">HỆ THỐNG</a></li>
			<li><a>QUẢN LÝ ĐỊA CHỈ</a>
			    <ul>
			    <li><a href="?option=qldc&mn1=dc">QUẢN LÝ KHU VỰC</a></li>
			    <li><a href="?option=qldc&mn1=d">QUẢN LÝ ĐƯỜNG</a></li>
			    <li><a href="?option=qldc&mn1=t">QUẢN LÝ TRƯỜNG</a></li>
			    </ul>
			</li>
			<li><a href="?option=qluser">QUẢN LÝ USER</a></li>
			<li><a href="?option=nhatro">QUẢN LÝ NHÀ TRỌ</a></li>
			</ul>
			<br style="clear: left;" />			
		</div>	
		<div class="clr"></div>
	</div>
	<div id="main">
		<div id="nd">
	
		
	
				<?php 
				if($option=="hethong")
				{
					require 'noidung/hethong.php';
				}elseif ($option=="qldc")
				{
					if(isset($_GET['mn1']))
					{
						$mn1 = $_GET['mn1'];
					}else {
						$mn1 ="";
					}
					if ($mn1=="dc")
					{
						require 'noidung/qlkhuvuc.php';
					}elseif ($mn1=="d"){
						require 'noidung/duong.php';
					}elseif ($mn1=="t"){
						require 'noidung/truong.php';
					}
				}elseif ($option=="qluser")
				{
					require 'noidung/qluser.php';
				}elseif ($option=="nhatro")
				{
					require 'noidung/nhatro.php';
				}else 
				{
					require 'noidung/trangchu.php';
				}
				?>		
		
		</div>
	</div>
	<div class="clr"></div>
	<div id="fooder">thiet ke boi</div>
</div>
</div>

</body>
</html>