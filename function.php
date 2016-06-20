<?php

    mysql_connect("localhost","root","root") or die("không thể kết nối database");
	mysql_select_db("qlpt");
	mysql_query("SET NAMES 'utf8'");

//người dùng	
	// danh sách user
	function dsUser()
	 {
		$str="";
		$str="select * from chutro";
		return  $str;
	 }
	// kiem tra dang nhap
	function get_user($user,$pass)
	{
		//echo $user,$pass;
		
		$sql=mysql_query("SELECT * FROM chutro WHERE nit ='".$user."' AND pass ='".$pass."'");
		if(mysql_num_rows($sql)==1)
		{
			session_start();
			$row = mysql_fetch_array($sql);
			//kiểm tra có phải admin không
			if(($row['nit'] == 'big' && $row['pass'] == 'bigktm' && $row['EMAIL']=='dfsd@gmail.com') or
				($row['nit'] == 'gis' && $row['pass'] == 'biggis' && $row['EMAIL']=='fs@gmail.com'))
				{
					
					$_SESSION['currUser']=$row['nit'];
					echo "<div class='login'>Admin:&nbsp".$_SESSION['currUser']."&nbsp|&nbsp<a href='#' onclick='reloadcont_ri_bot(),logout();'>Logout</a></div>";
					echo "<div class='menu'>";require"menu_cont.php";
					echo"</div>";
				}else
				{
					$_SESSION['currUser']=$row['nit'];
					echo "<div class='login'>User:&nbsp".$_SESSION['currUser']."&nbsp|&nbsp<a href='#' onclick='reloadcont_ri_bot(),logout();'>Logout</a></div>";
					echo "<div class='menu'>";require"menu_cont.php";
					echo"</div>";
				}
		}else{
				require"formLogin.php";
				echo"<div class='login_s'><span style='color:white'>Thông tin sai!</span></div>";
				
		}
	}
	
	//lấy mã người dùng bằng tên
	function get_mand($user)
	{
		//echo $user,$pass;
		
		$sql=mysql_query("SELECT MATK FROM chutro WHERE TENND like '".$user."'");
		if(!$sql){
			die('Không có user này!: ' . mysql_error());
		}
		$row = mysql_fetch_array($sql);
		return $row['MATK'];
	}
	
//chùa
		//chọn tất cả dữ liệu bảng chùa
		 function dsnhatro()
		 {
			$str="";
			$str="select * from nhatro";
			return  $str;
		 }
		 //chọn chùa đưa vào option 
		 function dsnhatro_b()
		 {
			$str="";
			$str="select * from nhatro";
			return  $str;
		 }
		
		 
//phường xã
		  //danh sách phường xã
		 function dspx()
		 {
			$str="";
			$str="select IDPX, TENPX from phuongxa";
			return  $str;
		 }
		  //danh sách phường xã
		 function dspx_p()
		 {
			$str="";
			$str="select * from phuongxa";
			return  $str;
		 }
		  // lấy tên phường xã theo mã phương xã trong trong bảng chùa
		 function get_px($mapx)
		 {
			$tenpx="";
			//echo $matl1;
			$str="select TENPX from phuongxa where IDPX =".$mapx;
			$tenpx=mysql_query($str);
			if(! $tenpx )
				{
					die('Không lấy được dữ liệu: ' . mysql_error());
				}
			while($row=mysql_fetch_array($tenpx))
			{   
				//echo $row['TENPX'];
				return $row['TENPX'];
			}
		 }

//đường
		 //danh sách đường
		 function dsd()
		 {
			$str="";
			$str="select IDD, TEND from duong";
			return  $str;
		 }
		 //danh sách đường
		 function dsd_p()
		 {
			$str="";
			$str="select * from duong";
			return  $str;
		 }
		 // lấy tên đường theo mã đường trong trong bảng chùa
		 function get_d($mad)
		 {
			$tend="";
			//echo $matl1;
			$str="select TEND from duong where IDD =".$mad;
			$tend=mysql_query($str);
			if(! $tend )
				{
					die('Không lấy được dữ liệu: ' . mysql_error());
				}
			while($row=mysql_fetch_array($tend))
			{  
				//echo $row['TEND'];
				return $row['TEND'];
			}
		 }
		  // lấy tên đường theo mã đường trong trong bảng chùa
		 function get_qh($mapx)
		 {
			$tenqh="";
			//echo $matl1;
			$strr="select IDQH from phuongxa where IDPX =".$mapx;
			$tenqhr=mysql_query($strr);
			if(! $tenqhr )
				{
					die('Không lấy được dữ liệu: ' . mysql_error());
				}
			while($rowr=mysql_fetch_array($tenqhr))
			{  
				//echo $row['TEND'];
				return $rowr['IDQH'];
			}
			
		 }
		/*  function get_tp($mad)
		 {
			$tentp="";
			//echo $matl1;
			$strr="select IDTP from duong where IDD =".$mad;
			$tenqhr=mysql_query($strr);
			if(! $tenqhr )
				{
					die('Không lấy được dữ liệu: ' . mysql_error());
				}
			while($rowr=mysql_fetch_array($tenqhr))
			{  
				//echo $row['TEND'];
				return $rowr['IDTP'];
			}
		
			
		 }
		 //danh sách quan huyen
		 function dsqh()
		 {
			$str="";
			$str="select IDQH, TENQH from quanhuyen";
			return  $str;
		 }
		 //danh sách thanh pho
		 function dstp()
		 {
			$str="";
			$str="select IDTP, TENTP from thanhpho";
			return  $str;
		 }
		//danh sach phong tro
		 function dsphongtro($idnt)
		 {
			$str="";
			$str="select * from phongtro where IDNT=".$idnt;
			return  $str;
		 }*/
 ?>