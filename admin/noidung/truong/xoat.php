xoa truong
<?php
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	$idtxoa=$_REQUEST['t'];
	xoa_t($idtxoa);
	ob_end_clean();
	header('location:admin.php?option=qldc&mn1=t');