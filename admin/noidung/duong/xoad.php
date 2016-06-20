xoa duong
<?php
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	
	$iddxoa=$_REQUEST['d'];
	xoa_d($iddxoa);
	ob_end_clean();
	header('location:admin.php?option=qldc&mn1=d&chontp='.$chontp);