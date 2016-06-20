<?php
	
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	$idtpxoa=$_REQUEST['tp'];
	xoa_tp($idtpxoa);
		header('location:admin.php?option=qldc&mn1=dc');