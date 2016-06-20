<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	if(isset($_REQUEST['t']))
	{
	
		$get_tdxht=mysql_fetch_array(get_tdxht($_REQUEST['t'],$chontp));
	}
	else {
		$get_tdxht[3]=$_REQUEST['tentsua'];
	}
	if(isset($_REQUEST['cnt']))
	{
		$gettent=get_tentruong($_REQUEST['tentsua']);
		if(mysql_num_rows($gettent) != "" )
		{
			$row=mysql_fetch_array($gettent);
			echo $row[0];
			if($row[0]==$_REQUEST['tentsua'])
			{
				sua_t($_REQUEST['tentsua'],$_REQUEST['chond'],$_REQUEST['chonpx'],$_REQUEST['t'],$_REQUEST['sonha']);
				ob_end_clean();
				header('location:admin.php?option=qldc&mn1=t');
			}
			else
			{
				echo "Tên Trường Đã Tồn Tại<br />";
			}
		}
		else
		{
			sua_t($_REQUEST['tentsua'],$_REQUEST['chond'],$_REQUEST['chonpx'],$_REQUEST['t'],$_REQUEST['sonha']);
			ob_end_clean();
			header('location:admin.php?option=qldc&mn1=t');
		}
	}
?>
<table border="1"  align='center'><form action="" method="post">
<tr><td><b>Tên Trường: </b></td><td><input type='text' name='tentsua' value='<?php echo $get_tdxht[3];?>'></td></tr>
<tr>
	<td>
		Huyện/Quận: 
	</td>
	<td>
	<select name="chonqh" onchange="submit()">
		<option value='' >Huyện/Quận</option>
			
		<?php
			if(isset($_REQUEST['chonqh']))
							{
					$chonqh= $_REQUEST['chonqh'];
			}else{$chonqh=$get_tdxht[0];}
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
		
		</select>
	</td>
<tr>
	<td>
		Xã/Phường:
	</td>
	<td>
	 <select name="chonpx" onchange="submit()">
		<option value='' >Xã/Phường</option>
			
		<?php
			if(isset($_REQUEST['chonpx']))
							{
					$chonpx= $_REQUEST['chonpx'];
			}else{$chonpx=$get_tdxht[1];}
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
		<b>Số Nhà: </b>
	</td>
	<td>
		<input type="text" name="sonha" size="15" value='<?php echo $get_tdxht[4];?>'>(VD: Số 5)
	</td>
</tr>
<tr>
	<td>
			<b>Đường: </b>
	</td>
	<td>
			<select name="chond" onchange="submit()">
			<option value='' >Chọn Đường</option>
				
			<?php
				if(isset($_REQUEST['chond']))
								{
						$chond= $_REQUEST['chond'];
				}else{$chond=$get_tdxht[2];}
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
	<td></td><td><input type='submit' name='cnt' value='Cập Nhật'></input></td>
</tr>
</form>
</table>