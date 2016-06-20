<?php
	

	
	mysql_connect("localhost","root","root") or die("không thể kết nối database");
	mysql_select_db("qlpt");
	mysql_query("SET NAMES 'utf8'");
	session_start();
	// kiem tra dang nhap
	function get_userdn($user,$pass)
	{
		$sql=mysql_query("SELECT * FROM useradmin WHERE user ='".$user."' AND pass = '".$pass."' ");
		if(mysql_num_rows($sql)==1)
		{
			$row = mysql_fetch_array($sql);
			
			$_SESSION['currUser']=$row['user'];
			header("location:admin.php");
		}else{
			echo "Tên đăng nhập hoặt mật khẩu sai";
		}
	}
	
	
	
?>


