<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['luu']))
	{
		if(isset($_REQUEST['checkpass']))
		{
			mysql_query("UPDATE chutro SET TEN='".$_REQUEST['ten']."',pass='".$_REQUEST['password']."', TUOI='".$_REQUEST['tuoi']."',CMND='".$_REQUEST['cmnd']."',SDT='".$_REQUEST['sdt']."',EMAIL='".$_REQUEST['email']."' WHERE nit='".$_REQUEST['nit']."'");
		}
		else 
		{
			mysql_query("UPDATE chutro SET TEN='".$_REQUEST['ten']."', TUOI='".$_REQUEST['tuoi']."',CMND='".$_REQUEST['cmnd']."',SDT='".$_REQUEST['sdt']."',EMAIL='".$_REQUEST['email']."' WHERE nit='".$_REQUEST['nit']."'");
		}
		echo "Sửa Thành Công";
	}
	elseif (isset($_REQUEST['thoat']))
	{
		ob_end_clean();
		header('location:admin.php?option=qluser');
	}
	$user=get_usernt($_REQUEST['nit']);
	$row=mysql_fetch_array($user);
?>
<form method="post" action="">
<table>
	<?php 
		echo "<tr><td>Tên đăng nhập:</td><td>$row[0] <input type='submit' name='checkpass' value='đổi mật khẩu' style='background:none;border: 0px;color: blue;'></td></tr>";
		if(isset($_REQUEST['checkpass']))
		{
			echo "<tr><td>Mật khẩu:</td><td><input type='password' name='password'></td></tr>
				  <tr><td>Nhập lại Mật khẩu:</td><td><input type='password' name='password'></td></tr>";
		}
		echo "<tr><td>Tên chủ trọ :</td><td><input type='text' name='ten' value='$row[2]'></td></tr>
			  <tr><td>Tuổi :</td><td><input type='text' name='tuoi' value='$row[3]'></td></tr>
			  <tr><td>CMND :</td><td><input type='text' name='cmnd' value='$row[4]'></td></tr>
			  <tr><td>SĐT  :</td><td><input type='text' name='sdt' value='$row[6]'></td></tr>
			  <tr><td>Email:</td><td><input type='text' name='email' value='$row[7]'></td></tr>
			  <tr><td></td><td><input type='submit' name='luu' value='Thay đổi'><input type='submit' name='thoat' value='thoát'></td></tr>
				";
	
	
	
	?>
</table>
</form>