<?php 
if(!isset($_SESSION['currUser']))
{
	header("location:index.php");
}

	if(isset($_REQUEST['suatenqh']))
	{
		sua_qh($_REQUEST['suatenqh'],$_REQUEST['qh']);
		ob_end_clean();
		header('location:admin.php?option=qldc&tp='.$_REQUEST['tp']);
	}

?>
<td>
	<form method='post' action=''>
	<input type='text' name='suatenqh' value='<?php echo  $row[1];?>' size='10'>
</td>
<td>
	<input type="submit" value='Luu'>
	</form>
</td>