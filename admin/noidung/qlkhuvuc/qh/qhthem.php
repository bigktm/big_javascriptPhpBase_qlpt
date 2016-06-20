<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['themtenqh']))
	{
		$themqh="select * from quanhuyen where TENQH='".$_REQUEST['themtenqh']."'";
		$query=mysql_query($themqh);
		if(mysql_num_rows($query) != "" )
		{
			echo "Tên Quận Huyện Đã Tồn Tại<br />";
		}
		else
		{
		
			them_qh($_REQUEST['tp'],$_REQUEST['themtenqh']);
			echo "Thêm Quận Huyện Thành Công";
		}
	}

?>
<form action="" method="post">
	<input type="text" name="themtenqh" size='13'>
	<input type="submit" value="Thêm QH">
</form>