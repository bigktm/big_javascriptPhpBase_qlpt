<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['themtenpx']))
	{
		$thempx="select * from phuongxa where TENPX='".$_REQUEST['themtenpx']."'";
		$query=mysql_query($thempx);
		if(mysql_num_rows($query) != "" )
		{
			echo "Tên Xã (Phường) Đã Tồn Tại<br />";
		}
		else
		{
		
			them_px($_REQUEST['qh'],$_REQUEST['themtenpx']);
			echo "Thêm Xã (Phường) Thành Công";
		}
	}

?>
<form action="" method="post">
	<input type="text" name="themtenpx" size='13'>
	<input type="submit" value="Thêm XP">
</form>