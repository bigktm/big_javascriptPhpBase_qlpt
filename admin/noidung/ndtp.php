<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	require 'hamnd.php';
	
	$tp=get_tp();
	$cot=1;
?>
<Div id="topnd">
	<Div id="topndtrai"><b>Quản Lý Thành Phố:</b></Div>
	<Div id="topndphai"><a href='?option=qldc&mn1=tp&tp=0&qltp=them'>Thêm Thành Phố</a><br/></Div>
</Div>

<?php 
	if(!isset($_REQUEST['tp']))
	{
		echo "<table border='1' align='left'>";
		echo "<tr><th>STT</th><th>Tên Thàng Phố</th><th colspan='2'>Sửa / Xóa</th></tr>";
		while($row=mysql_fetch_array($tp))
		{
			echo "<tr>
					<td>$cot</td>
					<td>$row[TENTP]</td>
					<td><a href='?option=qldc&mn1=tp&tp=$row[IDTP]&qltp=sua'>Sửa</a></td>
					<td><a href='?option=qldc&mn1=tp&tp=$row[IDTP]&qltp=xoa'>Xóa</a></td>
				</tr>";
			$cot++;
		}
		echo "</tr>";
		echo "</table>";
	}elseif ($_REQUEST['qltp']=='them')
	{
//them thanh pho
		if (isset($_REQUEST['tentp']))
		{
			$themtp="select * from thanhpho where TENTP='".$_REQUEST['tentp']."'";
			$query=mysql_query($themtp);
			if(mysql_num_rows($query) != "" )
			{
				echo "Thành Phố Đã Tồn Tại<br />";
			}
			else
			{
				
				them_tp($_REQUEST['tentp']);
				echo "Thêm Thành Phố Thành Công";
			}
		}
?>

<h4>Thêm Thành Phố</h4>
	<form  action="" method="POST"  >
		Tên Thành Phố:<input type="text" name="tentp" /><br />
		<input type="submit" value="Thêm"/>
	</form>
<?php 
	
	}elseif ($_REQUEST['qltp']=='sua')
//sua thanh pho
	{
		if(isset($_REQUEST['suatentp']))
		{
			sua_tp($_REQUEST['suatentp'],$_REQUEST['tp']);
			echo "Sửa Thành Công";
		}else{
?>
<h4>Sửa Thành Phố</h4>
	<form  action="" method="POST"  >
		Tên Thành Phố:<input type="text" name="suatentp" value="<?php $tp_ten=get_idtp($_REQUEST['tp']) ; echo $tp_ten[1]; ?>"/><br />
		<input type="submit" value="Sửa"/>
		<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); echo "<a href='$url'>Hủy</a>"; ?>
	</form>
<?php 
		}
	}elseif ($_REQUEST['qltp']=='xoa')
//xoa thanh pho
	{
		echo "ban muon xoa k?<br/>";
		echo "<a href='?option=qldc&mn1=tp&tp=".$_REQUEST['tp']."&qltp=xoayes'>Xóa</a>&nbsp&nbsp&nbsp&nbsp&nbsp";
		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  		echo "<a href='$url'>Hủy</a>"; 
	}elseif ($_REQUEST['qltp']=='xoayes')
	{
		if ($_REQUEST['qltp']=='xoayes')
		{
			xoa_tp($_REQUEST['tp']);
			echo "xoa thanh pho thanh cong";
		}
	}
?>
