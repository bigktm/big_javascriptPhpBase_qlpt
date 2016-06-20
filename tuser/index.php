<!DOCTYPE html>
<?php
session_start();
	include("function.php");
?>


<html>
<head>
<title>Nhà Trọ Đà Nẵng</title>
<link rel="stylesheet" type="text/css" href="format.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script language="javascript" src="tjs/ajax.js"></script>
<script language="javascript" src="tjs/tajax.js"></script>

    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDGEH75PFLiwTiCUrpj1lPWB5p19cye04&sensor=false">
    </script>
	<script type="text/javascript">
      function initialize(latt,lngt) {
	   var myLatlng = new google.maps.LatLng(latt,lngt);
        var mapOptions = {
          center: myLatlng,
          zoom: 16
        };
        var map = new google.maps.Map(document.getElementById('maps'),
            mapOptions);
      
	  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
   }   
    </script>
	
</head> 
<body onload="initialize(<?php if(isset($_REQUEST['tdv'])){echo $_REQUEST['tdv'];} else{echo "16.059459";}?>,<?php if(isset($_REQUEST['tdk'])){echo $_REQUEST['tdk'];} else{echo "108.216799";}?>)"> 
	<div id="web">
		<div id="banner">
			
			
				<?php
				if(isset($_SESSION['currUser']))
				{
					echo "<div class='session' align='center'>Chào:&nbsp".$_SESSION['currUser']."&nbsp|&nbsp<a href='#' onclick='javascript:logout();'>Logout</a></div>";
						
				}else{
					echo"<div class='form_log'>
					<form action='' method='post' align='right'>
						<b>Tài Khoản: &nbsp </b><input id='user' type='text' size='10' name='user' />&nbsp&nbsp
						<b>Mật Khẩu: &nbsp </b><input id='pass' type='password' size='10' name='pass' />&nbsp&nbsp
						<a href='#' onclick='login(),reloadcont_ri_bot();'>Đăng Nhập</a>|
						<a href='#' onclick='register(),reloadbanner();'>Đăng ký</a>
					</form></div>";
				}
				?>
			
			<div class="menu" align="right">
				<?php
					require"menu_cont.php";
				?>
			</div>
		</div>
		<div id="content">
			<div id="content_le">
					<div id="content_le_bot">
						<?php require"cont_leftbot.php";?>
					</div>
					<div id="maps">
					</div>
			</div>		
			<div id="content_ri">
				<div id="content_ri_top" align="center" bgcolor="#ff0000">
					<marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2" direction="left" style="width:100% height:100% margin: 5px;"  align="center">
								<?php require"cont_marq.php"; ?>		
					</marquee>
				</div>
				<div id="content_ri_bot">
					<?php require"cont_index.php"; ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
 