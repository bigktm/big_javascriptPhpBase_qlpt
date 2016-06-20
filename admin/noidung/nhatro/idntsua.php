<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	
		//thay doi user table nhatro
		if(isset($_REQUEST['thaydoiuser']))
		{
			$getuser=get_usernt($_REQUEST['tenuser']);
			if(mysql_num_rows($getuser) != "" )
			{
				mysql_query("UPDATE nhatro SET nit='".$_REQUEST['tenuser']."' WHERE IDNT=".$_REQUEST['idntsua']."");
				echo "Thay đổi USER Thành công<br />";
			}
			else
			{
				echo "USER không Tồn Tại<br />";
			}
				
				
				
		}
		
		//xoa phong
		if(isset($_REQUEST['soaphong']))
		{
			mysql_query("DELETE FROM phongtro WHERE IDPT='".$_REQUEST['soaphong']."'");
		}
		//them phong
		if(isset($_REQUEST['themphongnew']))
		{
			mysql_query("insert into phongtro values('',".$_REQUEST['dtnew'].",'".$_REQUEST['loainew']."',".$_REQUEST['gianew'].",".$_REQUEST['idntsua'].",'--','0')");
		}
		//sua phong
		if(isset($_REQUEST['suaphong']))
		{
			$idpt=$_REQUEST['suaphong'];
		}else {$idpt=-1;}
		if(isset($_REQUEST['sualaiphong']))
		{
			mysql_query("UPDATE phongtro SET DT=".$_REQUEST['dt'].",LOAI='".$_REQUEST['loai']."',GIA=".$_REQUEST['gia'].",IDNT=".$_REQUEST['idntsua']." WHERE IDPT='".$idpt."'");
			$idpt=-1;
		}
		//thoat
		elseif (isset($_REQUEST['thoat']))
		{
			ob_end_clean();
			header('location:admin.php?option=nhatro');
		}
		
		
		
		
		
		
		//noidung
		echo "<table class='table' border='1'>
				<form method='post' action=''>";
		
		if(isset($_REQUEST['idntsua']))
		{
			$nt=get_nt2($_REQUEST['idntsua']);
		}
		else
		{
			$nt=get_nt();
		}
		$row=mysql_fetch_array($nt);
		$dchi=get_dcnt($row['IDNT']);
		$row1=mysql_fetch_array($dchi);
		$sum=get_soluong($row['IDNT']);
		$sum=mysql_num_rows($sum);
		echo "<tr><td>Địa Chỉ Nhà:</td><td>$row[1] ".$row1['TEND'].", X/P ".$row1['TENPX'].", H/Q ".$row1['TENQH'].", T/TP ".$row1['TENTP']."</td></tr>";
		echo "<tr><td>USER Chủ Nhà:</td><td><input type='text' name='tenuser' value='$row[5]'><input type='submit' name='thaydoiuser' value='Thay Đổi USER' style=' margin: 12px 5px 10px 17px;'></td></tr>";
		echo "<tr><td>Số lượng Phòng: $sum</td><td>";
		$get_pt=get_pt($row['IDNT']);
		echo "<table id='tableptedit' ><tr><th width="."100px".">Phòng</th><th width="."180px".">diện tích</th><th width="."140px".">loại phòng</th><th width="."180px"."> giá/tháng</th><th colspan='2'>Sửa/Xóa</th></tr>";
		$phong=1;
		
		while($row3=mysql_fetch_array($get_pt))
		{
			if($row3[0]==$idpt)
			{
				echo "<tr><td>Phòng thứ $phong</td><td><input type='text' name='dt' value='$row3[1]' size='15'> m2</td>
					<td><input type='text' name='loai' value='$row3[2]' size='15'></td><td>
					<input type='text' name='gia' value='$row3[3]' size='15'> VND</td>
					<td><input type='submit' name='sualaiphong' value='lưu' size='15'></td>
					<td></td></tr>";
			}
			else 
			{
				echo "<tr><td>Phòng thứ $phong</td><td>$row3[1] (m2)</td>
					<td>$row3[2]</td>
					<td>$row3[3] (VND)</td>
					<td><a href='admin.php?option=nhatro&idntsua=".$_REQUEST['idntsua']."&suaphong=$row3[0]'><img src='img/sua.png' width='20'></a></td>
					<td><a href='admin.php?option=nhatro&idntsua=".$_REQUEST['idntsua']."&soaphong=$row3[0]'><img src='img/xoa.png' width='20'></a></td></tr>";
			}
				$phong++;
		}
		if(isset($_REQUEST['themphong']))
		{
			echo "<tr><td>Phòng thứ $phong</td><td><input type='text' name='dtnew' value='' size='15'> m2</td>
				<td><input type='text' name='loainew' value='' size='15'></td><td>
				<input type='text' name='gianew' value='' size='15'> VND</td>
				<td><input type='submit' name='themphongnew' value='lưu' size='15'></td></tr>";
		}
		echo "</table><Div class='themphong'><a href='admin.php?option=nhatro&idntsua=".$_REQUEST['idntsua']."&themphong=yes'>Thêm phòng</a></Div>";		
		echo "</td></tr>";
		echo "<tr><td></td><td><input type='submit' name='thoat' value='Thoát' style=' margin: 38px 5px 10px 5px;'></td></tr>";
		
		echo "</form></table>";
		
		
?>