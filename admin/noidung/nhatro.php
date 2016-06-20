<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	require 'qluser/hamuser.php';
	require 'nhatro/hamnt.php';
?>

<Div id="topnd">
	<Div id="topndtrai"><b>Quản Lý Nhà Trọ:</b></Div>
</Div>
<?php if (isset($_REQUEST['idntsua']) || isset($_REQUEST['idntthem'])){}
else
{
	if(isset($_REQUEST['colors'])){$radio=$_REQUEST['colors'];}else {$radio='khuvuc';} ?>
<form method="post" action="" style='padding: 15px 0 0 0;'>
	Tìm Kiếm Nhà Trọ Theo:&nbsp&nbsp&nbsp&nbsp
	<input type="radio" name="colors" value="khuvuc" onchange="submit()"<?php if($radio=="khuvuc") {echo 'checked';}?>> Theo Khu Vực &nbsp&nbsp
	<input type="radio" name="colors" value="duong" onchange="submit()"<?php if($radio=="duong") {echo 'checked';}?>> Theo Đường &nbsp&nbsp
	<input type="radio" name="colors" value="truong" onchange="submit()"<?php if($radio=="truong") {echo 'checked';}?>> Theo Trường  &nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp
	<input type="text" name="keyword" size="40" <?php  if(isset($_REQUEST['keyword']))echo "value='".$_REQUEST['keyword']."'";?>> <input type="submit" name="timkiem" value="Tìm Kiếm">

	<br/><br/>
	
		<span style='color: rgb(189, 0, 174);'>Tỉnh/Thành Phố:</span>
		<select name="chontp" onchange="submit()">
			<option value='' >Chọn Thành Phố</option>
			
			<?php
				
				$tp=get_tp();
				if(isset($_REQUEST['chontp']))
								{
						$chontp= $_REQUEST['chontp'];
				}else{$chontp=1;}
				while($row=mysql_fetch_array($tp))
				{
					if($chontp==$row[IDTP])
						{
							echo "<option value='$row[IDTP]' selected='selected' >$row[TENTP]</option>";
						}else {
							echo "<option value='$row[IDTP]'>$row[TENTP]</option>";
						}
				}
				$chuoi=" as nt inner join phuongxa as px on px.IDPX=nt.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						inner join thanhpho as tp on qh.IDTP=tp.IDTP
						WHERE tp.IDTP=$chontp";
			?>
		</select>
		
		
		
		
		
		
	<?php if($radio=="khuvuc"){?>	
		
		<span style='color: rgb(189, 0, 174);'> Huyện/Phường:</span>
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
			if($chonqh!="")
			{
				$chuoi=" as nt inner join phuongxa as px on px.IDPX=nt.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						WHERE qh.IDQH=$chonqh";
			}
		?>
		
		</select>
		
		
		
		
		
		<span style='color: rgb(189, 0, 174);'> Xã/Phường:</span>
		<select name="chonpx" onchange="submit()">
		<option value='' >Chọn phường xã</option>
			
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
			if($chonpx!="")
			{
				$chuoi=" as nt inner join phuongxa as px on px.IDPX=nt.IDPX
				WHERE px.IDPX=$chonpx";
			}
		?>
		
		</select>	<br/><br/>
	<?php }?>	
	<?php if($radio=="duong"){?>
		
		<span style='color: rgb(189, 0, 174);'> Chọn Đường:</span>
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
				}else
				{
					echo "<option value='$row[IDD]'>$row[TEND]</option>";
				}
			}
			if($chond!="")
			{
				$chuoi=" as nt inner join duong as d on d.IDD=nt.IDD
				WHERE d.IDD=$chond";
			}
		?>
		</select><br/><br/>
	<?php }?>
	<?php if($radio=="truong"){?>
		
		<span style='color: rgb(189, 0, 174);'> Chọn Trường:</span>
		<select name="chont" onchange="submit()">
		<option value='' >Chọn Trường</option>
			
		<?php
			if(isset($_REQUEST['chont']))
			{
				$chont= $_REQUEST['chont'];
			}else{$chont="";}
			$t=get_truong($chontp);
			while($row=mysql_fetch_array($t))
			{
				if($chont==$row[IDT])
				{
					echo "<option value='$row[IDT]' selected='selected' >$row[TEN]</option>";
				}else
				{
					echo "<option value='$row[IDT]'>$row[TEN]</option>";
				}
			}
			if($chont!="")
			{
				$chuoi=" as nt inner join truong as t on t.IDT=nt.IDT
				WHERE t.IDT=$chont";
			}
		?>
		</select><br/><br/>
	<?php }?>

	<?php   
	//timkiem $keyword
			if(isset($_REQUEST['timkiem']))
			{
				if($_REQUEST['keyword']!="")
				{
					$keyword=$_REQUEST['keyword'];
					$tenbang=timkiemtext($keyword);
					if($tenbang=="thanhpho"){$chuoi=" as nt inner join phuongxa as px on px.IDPX=nt.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						inner join thanhpho as tp on qh.IDTP=tp.IDTP
						WHERE tp.TENTP LIKE '%$keyword%'";}
					elseif($tenbang=="quanhuyen"){$chuoi=" as nt inner join phuongxa as px on px.IDPX=nt.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						WHERE qh.TENQH LIKE '%$keyword%'";}
					elseif($tenbang=="phuongxa"){$chuoi=" as nt inner join phuongxa as px on px.IDPX=nt.IDPX
						WHERE px.TENPX LIKE '%$keyword%'";}
					elseif($tenbang=="duong"){$chuoi=" as nt inner join duong as d on d.IDD=nt.IDD
						WHERE d.TEND LIKE '%$keyword%'";}
					else{$chuoi=" as nt inner join truong as t on t.IDT=nt.IDT
						WHERE t.TEN LIKE '%$keyword%'";}
				}
			}
			
			
			
			
			
	?>
	
</form>
<?php } ?>
<hr>
<?php 
	if(isset($_REQUEST['idntsua']))
	{
		require 'noidung/nhatro/idntsua.php';
	}
	elseif (isset($_REQUEST['idntxoa']))
	{
		require 'noidung/nhatro/idntxoa.php';
	}
	elseif (isset($_REQUEST['idntthem']))
	{
		require 'noidung/nhatro/idntthem.php';
	}
	else 
	{
		echo "<Div class='button'><a href='admin.php?option=nhatro&idntthem=them'>Thêm Nhà Trọ</a></Div>";
		if(isset($_REQUEST['timkiem'])){if($_REQUEST['keyword']!=""){if($tenbang==""){echo "không Tìm Thấy Từ Khóa: '".$keyword."'";}else{echo "Tìm Kiếm Với Từ Khóa: '".$keyword."'";}}}
		echo "<table class='table' border='1'>
			<tr><th width='500px'>Địa Chỉ Nhà Trọ</th><th width='100px'>S/L Phòng</th><th>USER</th><th>Tên Chủ Trọ</th><th>TT</th><th colspan='2'>Sửa/Xóa</th><th>C/T phòng</th></tr>";
				
				
				if(isset($_REQUEST['nit']))
				{
					$nt=get_nt1($_REQUEST['nit']);
				}
				else
				{
					$nt=get_nt($chuoi);
				}
				$cot=1;
				while($row=mysql_fetch_array($nt))
				{	
					$dchi=get_dcnt($row['IDNT']);
					$row1=mysql_fetch_array($dchi);
					$get_idct=get_usernt($row['nit']);
					$row2=mysql_fetch_array($get_idct);
					$get_pt=get_pt($row['IDNT']);
					
					echo "<tr>";
					echo "<td>$row[1] ".$row1['TEND'].", <span style='color: rgb(255, 66, 66);'>X/P</span> ".$row1['TENPX'].", <span style='color: rgb(255, 66, 66);'>H/Q</span> ".$row1['TENQH'].", <span style='color: rgb(255, 66, 66);'>T/TP</span> ".$row1['TENTP'];
					
					$sum=get_soluong($row['IDNT']);
					$sum=mysql_num_rows($sum);
					echo "<td>S/L Phòng: $sum</td>";
					echo "<td><a class='tips' href='admin.php?option=qluser&nit=$row[5]&suauser=yes'>$row[5]<Div class='phogtro'>";
					echo "<span style='color: rgb(189, 0, 174);'>Thông tin chủ trọ:</span><span style='color: rgb(0, 0, 0);float: right;-webkit-appearance: push-button;margin: 3px;padding: 3px;'>Sửa</span><br/>
							<table id='tablept' >
							<tr><td>--Tài Khoản:</td><td> $row[5]</td></tr>
							<tr><td>--Họ Tên:</td><td> $row2[2]</td></tr>
							<tr><td>--Tuổi:</td><td> $row2[3]</td></tr>
							<tr><td>--CMND:</td><td> $row2[4]</td></tr>
							<tr><td>--SĐT:</td><td> $row2[6]</td></tr>
							<tr><td>--Email:</td><td> $row2[7]</td></tr>
									</td></tr>
							</table>";
					echo "</div></a>";
					
					
					
					echo "</td><td>$row2[2]</td>";
					if($row2['TT']=="1")
						echo "<td><img src='noidung/qluser/img/tick.png'></td>";
					else
						echo "<td><img src='noidung/qluser/img/publish.png'></td>";
					echo "<td><a href='admin.php?option=nhatro&idntsua=$row[0]'><img src='img/sua.png' width='20'></a></td>
						  <td><a href='admin.php?option=nhatro&idntxoa=$row[0]'><img src='img/xoa.png' width='20'></a></td>";
					echo "<td><Div class='xem'><a class='tips' href='admin.php?option=nhatro&idntsua=".$row[0]."'>Xem<Div class='phogtro'>";
					echo "<span style='color: rgb(189, 0, 174);'>Thông tin phòng trọ:</span><span style='color: rgb(0, 0, 0);float: right;-webkit-appearance: push-button;margin: 3px;padding: 3px;'>Sửa</span><br/>
							<table id='tablept' ><tr><th>S/L Phòng</th><th>diện tích</th><th>loại phòng</th><th> giá</th><th>Chú Thích</th><th>TT</th></tr>";
					$phong=1;
					while($row3=mysql_fetch_array($get_pt))
					{
						echo "<tr><td>Phòng thứ $phong</td><td>$row3[1]</td><td>$row3[2]</td><td>$row3[3]</td><td>$row3[5]</td><td>";
						if($row3['TINHTRANG']==0){echo "Trống";}else{echo "Đã Thuê";}
						echo "</td></tr>";
						$phong++;
					}
					echo "</table>";
					echo "</div></a> </Div></td>";
					echo "</tr>";
					$cot++;
				}
			
			echo "</table>";
		}
?>