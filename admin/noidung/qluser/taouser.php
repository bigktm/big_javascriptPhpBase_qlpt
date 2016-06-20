<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['luu']))
	{
		$user=get_usernt($_REQUEST['nit']);
		if(mysql_num_rows($user) != "" )
		{
			echo "Tên USER Đã Tồn Tại<br />";
		}
		else
		{
		
			mysql_query("insert into chutro values('".$_REQUEST['nit']."',
													'".$_REQUEST['password']."',
													'".$_REQUEST['ten']."',
													'".$_REQUEST['tuoi']."',
													'".$_REQUEST['cmnd']."',
													'1',
													'".$_REQUEST['sdt']."',
													'".$_REQUEST['email']."')");

				
			
			echo "Tạo USER Thành Công";
		}
		
	}
	elseif (isset($_REQUEST['thoat']))
	{
		ob_end_clean();
		header('location:admin.php?option=qluser');
	}
	
?>
<form method="post" action="">
<table>
	<?php 
		echo "<tr><td>Tên đăng nhập:</td><td><input type='text' name='nit'></td></tr>";
		echo "<tr><td>Mật khẩu:</td><td><input type='password' name='password'></td></tr>
			  <tr><td>Nhập lại Mật khẩu:</td><td><input type='password' name='password'></td></tr>
			  <tr><td>Tên chủ trọ :</td><td><input type='text' name='ten' ></td></tr>
			  <tr><td>Tuổi :</td><td><input type='text' name='tuoi' ></td></tr>
			  <tr><td>CMND :</td><td><input type='text' name='cmnd' ></td></tr>
			  <tr><td>SĐT  :</td><td><input type='text' name='sdt' ></td></tr>
			  <tr><td>Email:</td><td><input type='text' name='email' ></td></tr>
			  <tr><td></td><td><input type='submit' name='luu' value='Thay đổi'><input type='submit' name='thoat' value='thoát'></td></tr>
				";
	
	
	
	?>
</table>
</form>