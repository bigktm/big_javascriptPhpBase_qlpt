<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	require 'hamnd.php';
	$tp=get_tp();
?>

<Div id="topnd">
	<Div id="topndtrai"><b>Quản Lý phường Xã:</b></Div>
	<Div id="topndphai"><a href='?option=qldc&mn1=px&px=0&qlpx=them'>Thêm phường Xã</a><br/></Div>
</Div>




<form method="post" action="">
<select name="chontp" onchange="submit()">
<option value='' >Chọn Thành Phố</option>
	
<?php
	if(isset($_REQUEST['chontp']))
					{
			$chontp= $_REQUEST['chontp'];
	}else{$chontp="";}
	while($row=mysql_fetch_array($tp))
	{
		if($chontp==$row[IDTP])
			{
				echo "<option value='$row[IDTP]' selected='selected' >$row[TENTP]</option>";
			}else {
				echo "<option value='$row[IDTP]'>$row[TENTP]</option>";
			}
	}
?>
</select>
<select name="chonqh" onchange="submit()">
<option value='' >Chọn Quận Huyện</option>
	
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

</select>
</form>

<?php 
 	
 	
 	echo "<hr>";

	if(!isset($_REQUEST['px']))
	{
		$cot=1;
		if(isset($_REQUEST['chonqh']))
		{
			$px=get_px($_REQUEST['chonqh']);
			echo "<table border='1' align='left'>";
			echo "<tr><th>STT</th><th>Tên Phường Xã</th><th colspan='2'>Sửa / Xóa</th></tr>";
			while($row=mysql_fetch_array($px))
			{
				echo "<tr>
						<td>$cot</td>
						<td>$row[1]</td>
						<td><a href='?option=qldc&mn1=px&px=$row[2]&qlpx=sua'>Sửa</a></td>
						<td><a href='?option=qldc&mn1=px&px=$row[2]&qlpx=xoa'>Xóa</a></td>
					</tr>";
				$cot++;
			}
			echo "</tr>";
			echo "</table>";
		}else 
		{
			echo "Hãy Chọn Thành Phố Để Thêm/Xóa/Sửa Quận Huyện";
		}
	}elseif ($_REQUEST['qlpx']=='them')
	{
//them phuong xa
		if(isset($_REQUEST['chonqh']))
		{
			if (isset($_REQUEST['tenpx']))
				{
					//$query=get_qh($_REQUEST['chontp']);
					//$a=0;
					//while($row11=mysql_fetch_array($query))
					//{
					//	if($row11[1]==$_REQUEST['tenqh'])
					//	{
					//		$a=1;
					//		break;
					//	}
					//}
					//if($a==1 )
					//{
					//	echo "Quận Huyện: <b>'$row11[1]'</b> Đã Tồn Tại<br />";
					//}
					//else
					//{
					//	them_qh($_REQUEST['chontp'],$_REQUEST['tenqh']);
					//	echo "Thêm Quận Huyện: <b>'".$_REQUEST['tenqh']."'</b> Thành Công";
					//}
					echo $_REQUEST['tenqh']."<br/>";
					echo $_REQUEST['tenpx']."<br/>";
					
					echo "them thanh cong";
				}
			
		}else 
		{
			echo $_REQUEST['tenqh']."<br/>";
			echo "lổi bạn hãy chọn quan huyen";
		}
		

?>

<h4>Thêm Phường Xã</h4>
	<form  action="" method="POST"  >
		Tên Phường Xã:<input type="text" name="tenpx" <?php if(isset($_REQUEST['tenpx'])){ echo "value='abc'";}?> /><br />
		<br/>
		<input type="submit" value="Thêm"/>
	</form>
<?php	
	}
?>