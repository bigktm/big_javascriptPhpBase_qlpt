<?php 	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
?>
<form method="post" action="">
	<input type="submit" name="Xoa" value="Xóa"><input type="submit" name="thoat" value="Quay lại">
</form>
<?php 
	if (isset($_REQUEST['Xoa']))
	{
		mysql_query("DELETE FROM chutro WHERE nit='".$_REQUEST['nit']."'");
		echo "xoa thanh cong";
	}
	elseif (isset($_REQUEST['thoat']))
	{
		ob_end_clean();
		header('location:admin.php?option=qluser');
	}
?>