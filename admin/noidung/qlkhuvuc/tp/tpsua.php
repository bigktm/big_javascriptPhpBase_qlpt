<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['suatentp']))
	{
		sua_tp($_REQUEST['suatentp'],$_REQUEST['tp']);
		ob_end_clean();
		header('location:admin.php?option=qldc');
	}

?>
<td>
	<form method='post' action=''>
	<input type='text' name='suatentp' value='<?php echo  $row[1];?>' size='10'>
</td>
<td>
	<input type="submit" value='Luu'>
	</form>
</td>