<?php 
	
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	require 'hamnd.php';
	ob_start();
?>
<Div id="topnd">
	<Div id="topndtrai"><b>Quản Lý Trường:</b></Div>
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
	if(isset($_REQUEST['suat']))
	{
		require 'truong/suat.php';
	}
	if(isset($_REQUEST['themt']))
	{
		require 'truong/themt.php';
	}
?>
<?php 
	echo "<Div class='button'><a href='?option=qldc&mn1=t&chontp=".$chontp."&themt=sua'>Thêm Trường</a></Div>";
	echo "<table class='tablet' border='1'>
		<tr><th width='25px'>STT</th><th width='180px'>Thành Phố</th><th width='500px'>Địa Chỉ</th><th width='215px'>Tên Trường</th><th colspan='2' width='80px'>Sửa/Xóa</th></tr>";
		$truong=get_truong($chontp);
		$dem=1;
		while($row=mysql_fetch_array($truong))
		{
			echo "<tr><td><center>$dem</center></td>";
			echo "<td>$row[0]</td>";
			echo "<td>-  $row[6] >> <span style='color: rgb(255, 66, 66);'>Phường:</span> $row[2] >> <span style='color: rgb(255, 66, 66);'>Quận:</span> $row[1]<br/>- <span style='color: rgb(255, 66, 66);'>Đường:</span> $row[3]</td>";
			echo "<td>$row[5]</td>";
			echo "<td ><a href='?option=qldc&mn1=t&t=$row[4]&suat=sua'><img src='img/sua.png' width='20'></a></td>";
			echo "<td ><a href='?option=qldc&mn1=t&t=$row[4]&xoat=xoa'><img src='img/xoa.png' width='20'></a></td></tr>";
			$dem++;
		}
		echo "</table>";
		if(isset($_REQUEST['xoat']))
		{
			require 'truong/xoat.php';
			echo "";
		}

?>



<?php /*
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
			echo "Tên Đường Đã Tồn Tại<br />";
		}
		else
		{
			$idtennew=is_sl($_POST['themtend'],$chontp);
			$idtennew1=mysql_fetch_array($idtennew);
			$idduong=$idtennew1[0];
			echo "Thêm Tên Đường Thành Công";
		}
	}
	if(isset($_POST['tendsua']))
	{
		sua_duong($_POST['tendsua'],$idduong);
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
	
	
	
}*/
?>