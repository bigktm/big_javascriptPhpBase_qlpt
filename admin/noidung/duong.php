<?php 
	
	if(!isset($_SESSION['currUser']))
	{
		ob_start();
		header("location:index.php");
	}
	require 'hamnd.php';
	ob_start();
?>
<Div id="topnd">
	<Div id="topndtrai"><b>Quản Lý Đường:</b></Div>
</Div>
<form method="post" action="" style='padding: 15px 0 0 0;'>
		<span style='color: rgb(189, 0, 174);'>Chọn Tỉnh/Thành Phố:</span>
		<select name="chontp" onchange="submit()">
			<option value='' >Chọn Thành Phố</option>
			
			<?php 
				if(isset($_REQUEST['chontp']))
				{
					$chontp= $_REQUEST['chontp'];
				}else{$chontp="1";}
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
		</select>
</form>
<hr>
<br />
<?php 
	if(isset($_REQUEST['suad']))
	{
		require 'duong/suad.php';
	}
	if(isset($_REQUEST['themd']))
	{
		require 'duong/themd.php';
	}
?>
<?php 
	echo "<Div class='button'><a href='?option=qldc&mn1=d&chontp=".$chontp."&themd=sua'>Thêm Đường</a></Div>";
	echo "<table class='tabled' border='1'>
		<tr><th width='25px'>STT</th><th width='180px'>Thành Phố</th><th width='150px'>Quận</th><th width='400px'>Phường</th><th width='160px'>Tên Đường</th><th colspan='2' width='85px'>Sửa/Xóa</th></tr>";
		
			//echo $_REQUEST['chontp'];
			$duong=get_duong($chontp);
			$cot=1;
			while($row=mysql_fetch_array($duong))
			{
				$duongquan=get_duongquan($chontp,$row[2]);
				$dem = mysql_num_rows($duongquan);
				echo "<tr>
				<td rowspan='$dem'><center>$cot</center></td>
				<td rowspan='$dem'>$row[1]</td>";
				$sotr=1;
				if($dem!=0)
				{
					while($row1=mysql_fetch_array($duongquan))
					{
						if($sotr==1)
						{
							echo "<td>$row1[0]</td>";
							$duongphuong=get_duongphuong($row1[1],$row[2]);
							echo "<td>";
							$demphuong=1;
							while($row2=mysql_fetch_array($duongphuong))
							{
								echo $row2[0].",  ";
								if($demphuong%3==0)
								{
									echo "<br />";
								}
								$demphuong++;
							}
							echo "</td><td rowspan='$dem'>$row[0]</td>
							<td rowspan='$dem'><a href='?option=qldc&mn1=d&chontp=$chontp&d=$row[2]&suad=sua'><img src='img/sua.png' width='20'></a></td>
							<td rowspan='$dem'><a href='?option=qldc&mn1=d&chontp=$chontp&d=$row[2]&xoad=xoa'><img src='img/xoa.png' width='20'></a></td></tr>";
							echo "</tr>";
						}else 
						{
							echo "<tr><td>$row1[0]</td>";
							$duongphuong=get_duongphuong($row1[1],$row[2]);
							echo "<td>";
							$demphuong=1;
							while($row2=mysql_fetch_array($duongphuong))
							{
								echo $row2[0].",  ";
								if($demphuong%3==0)
								{
									echo "<br />";
								}
								$demphuong++;
							}
							echo "</td>";
						}
						$sotr++;
					}
				}else
				{
					echo "<td></td><td></td>";
				}
				if($dem==0)
				{
					echo "<td rowspan='$dem'>$row[0]</td>
					<td rowspan='$dem'><a href='?option=qldc&mn1=d&d=$row[2]&suad=sua'><img src='img/sua.png' width='20'></a></td>
					<td rowspan='$dem'><a href='?option=qldc&mn1=d&d=$row[2]&xoad=xoa'><img src='img/xoa.png' width='20'></a></td></tr>";
					echo "</tr>";
				}
				$cot++;
			}
		
		echo "</table>";
		if(isset($_REQUEST['xoad']))
		{
			require 'duong/xoad.php';
			echo "";
		}

?>


<?php 
if(isset($_POST['sbMyForm']))
{
	if(isset($_REQUEST['d']))
	{
		$idduong=$_REQUEST['d'];
	}
	if(isset($_POST['themtend']))
	{
		$themtend="select * from duong where TEND='".$_REQUEST['themtend']."' AND IDTP='".$chontp."'";
		$query=mysql_query($themtend);
		if(mysql_num_rows($query) != "" )
		{
			echo "<p style='float:left;'>Tên Đường Đã Tồn Tại</p>";
		}
		else
		{
			$idtennew=is_sl($_POST['themtend'],$chontp);
			$idtennew1=mysql_fetch_array($idtennew);
			$idduong=$idtennew1[0];
			echo "<p style='float:left;'>Thêm Tên Đường Thành Công</p>";
			ob_end_clean();
			header('location:admin.php?option=qldc&mn1=d&chontp='.$chontp.'&themd=sua');
		}
	}
	
	if(isset($idduong))
	{
		if(isset($_POST['Checkboxpx']))
		{
			$checkpx=$_POST['Checkboxpx'];
			insetpx($checkpx,$idduong,$chonqh);
		}else
		{
			insetpx(0,$idduong,$chonqh);
		}
	}
	if(isset($_POST['tendsua']))
	{
		sua_duong($_POST['tendsua'],$idduong);
		ob_end_clean();
		header('location:admin.php?option=qldc&mn1=d&d='.$idduong.'&suad=sua');
	}
	
	
}
?>