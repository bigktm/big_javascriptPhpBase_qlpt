<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	
?>
<table border='1' align='center'>
	<tr><th><form method='post' action='' >Tên Đường: <input type='text' name='themtend' value='<?php if(isset($_REQUEST['themtend'])){echo $_REQUEST['themtend'];}?>'></th></tr>
	<tr><td>Chọn : 
	<select name='chonqh' onchange='submit()'>
	<option value='' >Huyện/Quận</option>
<?php 
	if(isset($_REQUEST['chonqh']))
	{
		$chonqh= $_REQUEST['chonqh'];
	}else{$chonqh=-1;}
	$qh=get_qh($chontp);
	
	while($row=mysql_fetch_array($qh))
	{
		if($chonqh==$row[IDQH])
		{
			echo "<option value='$row[IDQH]' selected='selected' >$row[TENQH]</option>";
		}else {
		echo "<option value='$row[IDQH]'>$row[TENQH]</option>";
		}
	}
	echo "</select>";
		echo "<hr>";
		echo "Chọn Xã/Phường:<br/>";
		$getxp=get_px($chonqh);
		$dempx=0;
		echo "<table class='tablets'><tr>";
		while($row=mysql_fetch_array($getxp))
		{
			if($dempx%2==0){ echo "</tr><tr>";}
			$dempx++;
			echo "<td><input type='checkbox' name='Checkboxpx[]' value = '$row[0]'>$row[1]</input></td>";
		}
		echo "</tr></table>";
		
		echo "<br/><input type='submit' name='sbMyForm' value='Hoàn thành'></input> ";
		echo "</td></tr></form>";
		echo "</table>";
?>
