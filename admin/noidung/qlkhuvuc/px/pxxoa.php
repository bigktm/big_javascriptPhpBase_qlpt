<?php
if(!isset($_SESSION['currUser']))
{
	header("location:index.php");
}
	$idpxxoa=$_REQUEST['px'];
	xoa_px($idpxxoa);
	ob_end_clean();
	header('location:admin.php?option=qldc&mn1=dc&tp='.$_REQUEST['tp'].'&qh='.$_REQUEST['qh']);