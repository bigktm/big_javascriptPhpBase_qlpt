<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	
		$tend=mysql_fetch_array(get_tenduong($_REQUEST['d']));
		echo "<table class='tableds' border='1' align='center' >";
		echo "<form method='post' action=''>";
		echo "<tr><th><b>Tên Đường: </b><input type='text' name='tendsua' value='".$tend[0]."'></th></tr>";
		echo "<tr><td>Chọn Quận/Huyện:";
		echo "<select name='chonqh' onchange='submit()'>";
		echo "<option value='' >Chọn</option>";
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
		echo "<table class='tablets'><tr>";
		$getxp=get_px($chonqh);
		$dempx=0;
		while($row=mysql_fetch_array($getxp))
		{
			if($dempx%2==0){ echo "</tr><tr>";}
			$dempx++;
			$checkpx=get_checkpx($row[0],$_REQUEST['d']);
			if(mysql_num_rows($checkpx) != "")
			{
				echo "<td><input type='checkbox' name='Checkboxpx[]' value = '$row[0]'  checked='checked'>$row[1]</input></td>";
			}else {
				echo "<td><input type='checkbox' name='Checkboxpx[]' value = '$row[0]'>$row[1]</input></td>";
			}
			
		}
		echo "</tr></table>";
		echo "<hr><input type='submit' name='sbMyForm' value='Thay Đổi'></input> ";
		echo "</td></tr></form>";
		echo "</table>";
?>