<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['submit']))
	{
		sua_px($_REQUEST['suatenpx'],$_REQUEST['px']);
		ob_end_clean();
		header('location:admin.php?option=qldc&tp='.$_REQUEST['tp'].'&qh='.$_REQUEST['qh']);
	}

?>
<td>
	<form method='post' action=''>
	<input type='text' name='suatenpx' value='<?php echo  $row[1];?>' size='10'>
</td>
<td>
	<input type="submit" value='Luu'>
	</form>
</td>