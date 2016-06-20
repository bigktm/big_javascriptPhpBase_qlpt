<?php 
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	


		//them nhatro
		
		if(isset($_REQUEST['themnt']))
		{
			$getuser=get_usernt($_REQUEST['nit']);
			if(mysql_num_rows($getuser) != "" )
			{
				$truong="null";
				if( $_REQUEST['motadiachi'] != "" && $_REQUEST['chond'] != "" && $_REQUEST['chonpx'] != "")
				{
					if($_REQUEST['nit']!="")
					{
						mysql_query("insert into nhatro values('',
										'".$_REQUEST['motadiachi']."',
										$truong,
										".$_REQUEST['chond'].",
										".$_REQUEST['chonpx'].",
										'".$_REQUEST['nit']."')
									");
						$idnt=mysql_query("SELECT IDNT FROM nhatro where MOTADIACHI='".$_REQUEST['motadiachi']."'
																	 AND IDD=".$_REQUEST['chond']."
																	 AND IDPX=".$_REQUEST['chonpx']."
																	 AND nit='".$_REQUEST['nit']."'");
						$rowidnt=mysql_fetch_array($idnt);
						header('location:admin.php?option=nhatro&idntthem=them&idnt='.$rowidnt[0]);
					}else{ echo "ACC Không Được Để Trống"; }
					
				}
				else
				{
					echo "Địa Chỉ Không Đúng";
				}
				
			}
			else
			{
				echo "acc Không tồn tại<br />";
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
			mysql_query("insert into phongtro values('',".$_REQUEST['dtnew'].",'".$_REQUEST['loainew']."',".$_REQUEST['gianew'].",".$_REQUEST['idntsua'].")");
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




		
		
		
		
		
		if(isset($_REQUEST['idnt']))
		
		{
			
			$nt=get_nt2($_REQUEST['idnt']);
			$row=mysql_fetch_array($nt);
			$dchi=get_dcnt($row['IDNT']);
			$row1=mysql_fetch_array($dchi);
			$sum=get_soluong($row['IDNT']);
			$sum=mysql_num_rows($sum);
			echo "<tr><td>Địa Chỉ Nhà:</td><td>$row[1] $row1[7], X/P $row1[10], H/Q $row1[13], T/TP $row1[16]</td></tr>";
			echo "<tr><td>USER Chủ Nhà:</td><td><input type='text' name='tenuser' value='$row[5]'><input type='submit' name='thaydoiuser' value='Thay Đổi USER' style=' margin: 12px 5px 10px 17px;'></td></tr>";
			echo "<tr><td>Số lượng Phòng: $sum </td><td>";
			
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
			echo "</table><Div class='themphong'><a href='admin.php?option=nhatro&idntthem=them&idnt=".$_REQUEST['idnt']."&themphong=yes'>Thêm phòng</a></Div>";		
			echo "</td></tr>";
			echo "<tr><td></td><td><input type='submit' name='thoat' value='Thoát'style=' margin: 38px 5px 10px 5px;'></td></tr>";
			
			
		}else
		{
			
			echo "<tr><td>Địa Chỉ Nhà:</td><td>";
			?>
			<form method="post" action="">
				<select name="chontp" onchange="submit()">
					<option value='' >Chọn Thành Phố</option>
					
					<?php
						
						$tp=get_tp();
						if(isset($_REQUEST['chontp']))
										{
								$chontp= $_REQUEST['chontp'];
						}else{$chontp=2;}
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
				>>
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
				>>
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
				?>
				
				</select>
					
			<?php 		
					echo ">>
							<select name='chond' onchange='submit()'>
							<option value='' >Chọn Đường</option>";
								
					
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
							
							
					echo "</select><input type='text' name='motadiachi' size='10px' value='số nhà'></td></tr>";
					echo "<tr><td>USER Chủ Nhà:</td><td><input type='text' name='nit'></td></tr>";
						
					echo "<tr><td></td><td><input type='submit' name='themnt' value='Lưu USER' style=' margin: 12px 5px 10px 17px;'><input type='submit' name='thoat' value='Thoát'style=' margin: 38px 5px 10px 5px;'></td></tr>";
		}
		echo "</form></table>";
?>