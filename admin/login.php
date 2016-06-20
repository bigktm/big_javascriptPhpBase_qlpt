<?php 
	require 'ham.php';
	if(isset($_SESSION['currUser']))
	{
		header("location:admin.php");
	}
	if(isset($_REQUEST['dangnhap']))
	{
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		get_userdn($user,$pass);
	}else{
		$user="";
	}
?>
<div id="login">
<table>
<form  action="" method="POST"  >
<tr>
	<td>Tên đăng nhập: </td>
	<td><input type="text" name="user" value="<?php echo $user; ?>" size='25'/></td>
</tr>	
<tr>
	<td>Mật khẩu:</td>
	<td><input type="password" name="pass" size='25'/></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="dangnhap" value="đăng nhập"/></td>

		
</tr>
</form>
</table>
</div>
