<?php
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['cnt']))
	{
		$gettent=get_tentruong($_REQUEST['tentthem']);
		if(mysql_num_rows($gettent) != "" )
		{
			echo "Tên Trường Đã Tồn Tại<br />";
		}
		else
		{
			then_truong($_REQUEST['tentthem'],$_REQUEST['chond'],$_REQUEST['chonpx']);
			ob_end_clean();
			header('location:admin.php?option=qldc&mn1=t');
		}
	}
?>
<table border="1"  align='center'><form action="" method="post" >
<tr><td><b>Tên Trường: </b><input type='text' name='tentthem' value='<?php if(isset($_REQUEST['tentthem'])){echo $_REQUEST['tentthem'];}?>'></td></tr>
<tr>
	<td>
		Chọn: <select name="chonqh" onchange="submit()">
		<option value='' >Quận Huyện</option>
			
		<?php
			if(isset($_REQUEST['chonqh']))
							{
					$chonqh= $_REQUEST['chonqh'];
			}else{$chonqh="";}
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
		?>
		
		</select><br/>
		Chọn: <select name="chonpx" onchange="submit()">
		<option value='' >Xã/Phường</option>
			
		<?php
			if(isset($_REQUEST['chonpx']))
							{
					$chonpx= $_REQUEST['chonpx'];
			}else{$chonpx="";}
			$px=get_px($chonqh);
			while($row=mysql_fetch_array($px))
			{
				if($chonpx==$row[IDPX])
					{
						echo "<option value='$row[IDPX]' selected='selected' >$row[TENPX]</option>";
					}else {
						echo "<option value='$row[IDPX]'>$row[TENPX]</option>";
					}
			}
		?>
		
		</select>
	</td>
</tr>
<tr>
	<td>
			<b>Đường: </b>
			<select name="chond" onchange="submit()">
			<option value='' >Chọn Đường</option>
				
			<?php
				if(isset($_REQUEST['chond']))
								{
						$chond= $_REQUEST['chond'];
				}else{$chond="";}
				$d=get_duong($chontp);
				while($row=mysql_fetch_array($d))
				{
					if($chond==$row[IDD])
						{
							echo "<option value='$row[IDD]' selected='selected' >$row[TEND]</option>";
						}else {
							echo "<option value='$row[IDD]'>$row[TEND]</option>";
						}
				}
			?>
			
			</select>
		
	</td>
</tr>
<tr>
	<td><input type='submit' name='cnt' value='Thêm'></input></td>
</tr>
</form>
</table>