<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['themtentp']))
	{
		$themtp="select * from thanhpho where TENTP='".$_REQUEST['themtentp']."'";
		$query=mysql_query($themtp);
		if(mysql_num_rows($query) != "" )
		{
			echo "Thành Phố Đã Tồn Tại<br />";
		}
		else
		{
		
			them_tp($_REQUEST['themtentp']);
			echo "Thêm Thành Phố Thành Công";
		}
	}

?>
<form action="" method="post">
	<input type="text" name="themtentp" size='13'>
	<input type="submit" value="Thêm TP">
</form>