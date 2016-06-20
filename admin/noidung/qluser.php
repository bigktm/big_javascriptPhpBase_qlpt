<?php 
	
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	require 'qluser/hamuser.php';
?>
<Div id="topnd">
	<Div id="topndtrai"><b>Quản Lý USER:</b></Div>
</Div>
<?php if (isset($_REQUEST['suauser']) || isset($_REQUEST['taouser'])){}
else
{
	if(isset($_REQUEST['colors'])){$radio=$_REQUEST['colors'];}else {$radio='khuvuc';} ?>
<form method="post" action="" style='padding: 15px 0 0 0;'>
	Tìm Kiếm USER Theo:&nbsp&nbsp&nbsp&nbsp
	<input type="radio" name="colors" value="khuvuc" onchange="submit()"<?php if($radio=="khuvuc") {echo 'checked';}?>> Theo Khu Vực &nbsp&nbsp
	<input type="radio" name="colors" value="duong" onchange="submit()"<?php if($radio=="duong") {echo 'checked';}?>> Theo Đường &nbsp&nbsp
	<input type="radio" name="colors" value="truong" onchange="submit()"<?php if($radio=="truong") {echo 'checked';}?>> Gần Trường  &nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp
	<input type="text" name="keyword"  size="40" <?php  if(isset($_REQUEST['keyword']))echo "value='".$_REQUEST['keyword']."'";?> > <input type="submit" name="timkiem" value="Tìm Kiếm">

	<br/><br/>
	
		<span style='color: rgb(189, 0, 174);'>Tỉnh/Thành Phố:</span>
		<select name="chontp" onchange="submit()">
			<option value='' >Chọn Thành Phố</option>
			
			<?php
				$chuoi="";
				$chuoi1="";
				$tp=get_tp();
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
				if($chontp!="")
				{
					$chuoi=" inner join phuongxa as px on px.IDPX=nhatro.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						inner join thanhpho as tp on qh.IDTP=tp.IDTP
						WHERE tp.IDTP=$chontp";
				}
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
				$chuoi=" inner join phuongxa as px on px.IDPX=nhatro.IDPX
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
				$chuoi=" inner join phuongxa as px on px.IDPX=nhatro.IDPX
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
				$chuoi=" inner join duong as d on d.IDD=nhatro.IDD
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
				$chuoi=" inner join truong as t on t.IDT=nhatro.IDT
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
					if($tenbang=="thanhpho"){$chuoi=" inner join phuongxa as px on px.IDPX=nhatro.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						inner join thanhpho as tp on qh.IDTP=tp.IDTP
						WHERE tp.TENTP LIKE '%$keyword%'";}
					elseif($tenbang=="quanhuyen"){$chuoi="inner join phuongxa as px on px.IDPX=nhatro.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						WHERE qh.TENQH LIKE '%$keyword%'";}
					elseif($tenbang=="phuongxa"){$chuoi=" inner join phuongxa as px on px.IDPX=nhatro.IDPX
						WHERE px.TENPX LIKE '%$keyword%'";}
					elseif($tenbang=="duong"){$chuoi=" inner join duong as d on d.IDD=nhatro.IDD
						WHERE d.TEND LIKE '%$keyword%'";}
					elseif($tenbang=="truong"){$chuoi=" inner join truong as t on t.IDT=nhatro.IDT
						WHERE t.TEN LIKE '%$keyword%'";}
					$tenbang=timkiemtextuser($keyword);
					
					if($tenbang=="chutro"){$chuoi1=" WHERE TEN LIKE '%$keyword%' OR nit LIKE '%$keyword%'";}
				}
			}
	?>
</form>
<?php } ?>
<hr>



<?php 

	if(isset($_REQUEST['suauser']))
	{
		require 'noidung/qluser/suauser.php';
	}
	elseif (isset($_REQUEST['xoauser']))
	{
		require 'noidung/qluser/xoauser.php';
	}
	elseif (isset($_REQUEST['taouser']))
	{
		require 'noidung/qluser/taouser.php';
	}
	else 
	{
		echo "<Div class='button'><a href='admin.php?option=qluser&taouser=yes'>Tạo user</a></Div>";
		if(isset($_REQUEST['timkiem'])){if($_REQUEST['keyword']!=""){if($tenbang==""){echo "không Tìm Thấy Từ Khóa: '".$keyword."'";}else{echo "Tìm Kiếm Với Từ Khóa: '".$keyword."'";}}}
		if(isset($_REQUEST['ttiduser']))
		{
			mysql_query("UPDATE chutro SET TT=".$_REQUEST['tt']." WHERE nit='".$_REQUEST['ttiduser']."'");
		}
		$user=get_user($chuoi,$chuoi1);
		echo "<table class='table' border='1'>
			<tr><th>User</th><th>Tên Chủ Trọ</th><th>tuổi</th><th>SĐT</th><th>CMND</th><th>Email</th><th>khóa/mở</th><th>Chi Tiết Nhà Trọ</th><th colspan='2'>Sửa/Xóa</th></tr>";
				
				while($row=mysql_fetch_array($user))
				{	
					echo "<tr>
					<td>$row[0]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[6]</td>
					<td>$row[4]</td>
					<td>$row[7]</td>";
					if($row['TT']=="1")
						echo "<td><a href='?option=qluser&ttiduser=$row[nit]&tt=0'><center><img src='noidung/qluser/img/tick.png'></center></a></td>";
					else
						echo "<td><a href='?option=qluser&ttiduser=$row[nit]&tt=1'><center><img src='noidung/qluser/img/publish.png'></center></a></td>";
					echo "<td><Div class='xem'><a href='?option=nhatro&nit=$row[nit]'>QL nhà trọ</a></Div></td>";
					echo "<td><a href='?option=qluser&nit=$row[nit]&suauser=yes'><img src='img/sua.png' width='20'></a></td>
						  <td><a href='?option=qluser&nit=$row[nit]&xoauser=yes'><img src='img/xoa.png' width='20'></a></td>";
					echo "</tr>";
				}
			
			echo "</table>";
	}
?>