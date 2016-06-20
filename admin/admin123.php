<?php 
	require 'ham.php';
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style/style.css" rel="stylesheet"/>
<title>Trang quảng trị</title>
</head>
<body>

<div id="swapper-w">
<div id="swapper">
	<div id="header">
		<div id="banner">chào bạn : <?php echo $_SESSION['currUser'];?> đến với trang quảng trị<br/>
		<a href="logout.php">logout</a></div>
	</div>
		<div id="menutop">
			<ul id="menu">
				<li <?php echo ($_GET['option']=="hethong") ? " id='menuchon' ":"" ; ?> ><a href="?option=hethong">Hệ Thống</a></li>
				<li <?php echo ($_GET['option']=="qldc") ? " id='menuchon' ":"" ; ?> ><a href="?option=qldc">Quản Lý Địa Chỉ</a></li>
				<li <?php echo ($_GET['option']=="qluser") ? " id='menuchon' ":"" ; ?> ><a href="?option=qluser">Quản Lý user Chủ Trọ</a></li>
			</ul>
		</div>
		<div class="clr"></div>
	
	<div id="main">
		<div id="left">menu</div>
		<div id="content">noi dung</div>
	</div>
	<div class="clr"></div>
	<div id="fooder">thiet ke boi</div>
</div>
</div>

</body>
</html>
