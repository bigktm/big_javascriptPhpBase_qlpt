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
	<Div id="topndtrai"><b>Quản Lý Quận Huyện:</b></Div>
	<Div id="topndphai"><a href='?option=qldc&mn1=qh&qh=0&qlqh=them'>Thêm Quận Huyện</a><br/></Div>
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
						echo "<option selected='selected' >$row[TENTP]</option>";
					}else {
						echo "<option value='$row[IDTP]'>$row[TENTP]</option>";
					}
				}
			?>
		</select>
	</form>
	<hr>
<?php 
	
	
	
	
	if(!isset($_REQUEST['qh']))
	{
		if(isset($_REQUEST['chontp']))
		{
			$qh=get_qh($_REQUEST['chontp']);
			echo "<table border='1' align='left'>";
			echo "<tr><th>STT</th><th>Tên Quận Huyện</th><th colspan='2'>Sửa / Xóa</th></tr>";
			while($row=mysql_fetch_array($qh))
			{
				echo "<tr>
						<td>$cot</td>
						<td>$row[TENQH]</td>
						<td><a href='?option=qldc&mn1=qh&qh=$row[IDQH]&qlqh=sua'>Sửa</a></td>
						<td><a href='?option=qldc&mn1=qh&qh=$row[IDQH]&qlqh=xoa'>Xóa</a></td>
					</tr>";
				$cot++;
			}
			echo "</tr>";
			echo "</table>";
		}else 
		{
			echo "Hãy Chọn Thành Phố Để Thêm/Xóa/Sửa Quận Huyện";
		}
	}elseif ($_REQUEST['qlqh']=='them')
	{
//them Quận Huyện
		if(isset($_REQUEST['chontp']))
		{
			if (isset($_REQUEST['tenqh']))
				{
					$query=get_qh($_REQUEST['chontp']);
					$a=0;
					while($row11=mysql_fetch_array($query))
					{
						if($row11[1]==$_REQUEST['tenqh'])
						{
							$a=1;
							break;
						}
					}
					if($a==1 )
					{
						echo "Quận Huyện: <b>'$row11[1]'</b> Đã Tồn Tại<br />";
					}
					else
					{
						them_qh($_REQUEST['chontp'],$_REQUEST['tenqh']);
						echo "Thêm Quận Huyện: <b>'".$_REQUEST['tenqh']."'</b> Thành Công";
					}
				}
			
		}else 
		{
			echo "lổi bạn hãy chọn thành phố";
		}
		

?>

<h4>Thêm Quận Huyện</h4>
	<form  action="" method="POST"  >
		Tên Quận Huyện:<input type="text" name="tenqh" /><br />
		<select name="chontp" ">
			<option value='' >Chọn Thành Phố</option>
			
			<?php 
				if(isset($_REQUEST['chontp']))
				{
					$chontp= $_REQUEST['chontp'];
				}else{$chontp="";}
				$tp=get_tp();
				while($row=mysql_fetch_array($tp))
				{
					if($chontp==$row[IDTP])
					{
						echo "<option selected='selected' >$row[TENTP]</option>";
					}else {
						echo "<option value='$row[IDTP]'>$row[TENTP]</option>";
					}
				}
			?>
		</select><br/>
		<input type="submit" value="Thêm"/>
	</form>
<?php 
	
	}elseif ($_REQUEST['qlqh']=='sua')
//sua quan huyen
	{
		if(isset($_REQUEST['suatenqh']))
		{
			sua_qh($_REQUEST['suatenqh'],$_REQUEST['qh']);
			echo "Sửa Thành Công";
		}else{
?>
			<h4>Sửa Quận Huyện</h4>
			<form  action="" method="POST"  >
				Tên Quận Huyện:<input type="text" name="suatenqh" value="<?php $qh_ten=get_idqh($_REQUEST['qh']) ; echo $qh_ten[1]; ?>"/><br />
				<input type="submit" value="Sửa"/>
				<?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); echo "<a href='$url'>Hủy</a>"; ?>
			</form>
<?php 
		}
	}elseif ($_REQUEST['qlqh']=='xoa')
//xoa quan huyen
	{
		
		echo "ban muon xoa k?<br/>";
		echo "<a href='?option=qldc&mn1=qh&qh=".$_REQUEST['qh']."&qlqh=xoayes'>Xóa</a>&nbsp&nbsp&nbsp&nbsp&nbsp";
		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  		echo "<a href='$url'>Hủy</a>"; 
	}elseif ($_REQUEST['qlqh']=='xoayes')
	{
		if ($_REQUEST['qlqh']=='xoayes')
		{
			xoa_qh($_REQUEST['qh']);
			echo "xoa thanh pho thanh cong";
		}
	}
?>
