<?php
	
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	$idqhxoa=$_REQUEST['qh'];
	xoa_qh($idqhxoa);
	ob_end_clean();
	header('location:admin.php?option=qldc&mn1=dc&tp='.$_REQUEST['tp']);