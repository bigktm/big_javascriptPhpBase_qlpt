<?php 

echo "<div class='combo'>";	
		
	//lấy thành phố
	function get_tp()
	{
		$tp=mysql_query("SELECT * FROM thanhpho");
		return $tp;
	}
	//lấy quận huyện
	function get_qhp($idtp)
	{
		$qh=mysql_query("SELECT * FROM quanhuyen where IDTP=".$idtp);
		return $qh;
	}
	//lấy phường xã
	function get_pxp($idqh)
	{
		$px=mysql_query("SELECT * FROM phuongxa where IDQH=".$idqh);
		return $px;
	}
	//lấy dduong
	function get_dp($idd)
	{
		$dp=mysql_query("SELECT * FROM duong where IDTP=".$idd);
		return $dp;
	}
	//lấy truong
	function get_trp($idtr)
	{
		$trp=mysql_query("SELECT * FROM truong where IDPX=".$idtr);
		return $trp;
	}//lấy gia
	function get_gip($idgi)
	{
		if($idgi==1)
		{
			$gip=mysql_query("SELECT * FROM phongtro where GIA >=300.000 AND GIA <=600.000");
		}
		if($idgi==2)
		{
			$gip=mysql_query("SELECT * FROM phongtro where GIA >=600.000 AND GIA <=1.000.000");
		}
		if($idgi==3)
		{
			$gip=mysql_query("SELECT * FROM phongtro where GIA >1.000.000");
		}
		else 
		$gip=mysql_query("SELECT * FROM phongtro");
		
		return $gip;
	}//lấy lao phong
	function get_lp($idlp)
	{
		if($idlp==1)
		{
			$lp=mysql_query("SELECT * FROM phongtro where LOAI like '2 đến 3 người'");
		}
		if($idlp==2)
		{
			$lp=mysql_query("SELECT * FROM phongtro where LOAI like 'trên 4 người'");
		}
		else
			$lp=mysql_query("SELECT * FROM phongtro");
		
		return $lp;
	}
	//tạo các combobox
		echo "<form name='gh' action='' method='post' >
		<table><tr><td><select id='combo_se' name='chontp' onchange='submit(),listtp()'>
			<option value='0' size='20'>Chọn Thành Phố</option>";
			
	
				$chontp=0;
				$tp=get_tp();
				if(isset($_REQUEST['chontp']))
								{
						$chontp= $_REQUEST['chontp'];
				}
				while($rowr=mysql_fetch_array($tp))
				{
					if($chontp==$rowr['IDTP'])
						{
							echo "<option value='".$rowr['IDTP']."' selected='selected' >".$rowr['TENTP']."</option>";
						}else {
							echo "<option value='".$rowr['IDTP']."'>".$rowr['TENTP']."</option>";
						}
				}
				
		
		echo"</select></td>
		
		
		
		
		

		<td><select id='combo_se' name='chonqh' onchange='submit(),listqh()'>
		<option value='0' size='20'>Chọn Quận Huyện</option>";
			$chonqh=0;
			if(isset($_REQUEST['chonqh']))
							{
					$chonqh= $_REQUEST['chonqh'];
			}
			$qh=get_qhp($chontp);
			
			while($rowq=mysql_fetch_array($qh))
			{
				if($chonqh==$rowq['IDQH'])
					{
						echo "<option value='".$rowq['IDQH']."' selected='selected' >".$rowq['TENQH']."</option>";
					}else {
						echo "<option value='".$rowq['IDQH']."'>".$rowq['TENQH']."</option>";
					}
			}
		
		
		echo "</select></td>";
		//phuong xa
		echo "<td><select id='combo_se' name='chonpx' onchange='submit(),listpx()'>
		<option value='0' size='20'>Chọn phường xã</option>";
			
			$chonpx=0;
			if(isset($_REQUEST['chonpx']))
							{
					$chonpx= $_REQUEST['chonpx'];
			}
			$px=get_pxp($chonqh);
			
			while($rowp=mysql_fetch_array($px))
			{
				if($chonpx==$rowp['IDPX'])
					{
						echo "<option value='".$rowp['IDPX']."' selected='selected' >".$rowp['TENPX']."</option>";
					}else {
						echo "<option value='".$rowp['IDPX']."'>".$rowp['TENPX']."</option>";
					}
			}
		
		
		
		echo"</select></td></tr>";
		//duong
		
		
		
		
	
		
		echo"<tr><td><select id='combo_se' name='chondp' onchange='submit(),listdu()'>
		<option value='0' size='20'>Chọn đường</option>";
			
			$chondp=0;
			if(isset($_REQUEST['chondp']))
							{
					$chondp= $_REQUEST['chondp'];
			}
			$dp=get_dp($chontp);
			
			while($rowd=mysql_fetch_array($dp))
			{
				if($chondp==$rowd['IDD'])
					{
						echo "<option value='".$rowd['IDD']."' selected='selected' >".$rowd['TEND']."</option>";
					}else {
						echo "<option value='".$rowd['IDD']."'>".$rowd['TEND']."</option>";
					}
			}
			
		
		echo"</select></td>";
		//truong
		
		echo"<td><select id='combo_se' name='chontr' onchange='submit(),listtr()' >
		<option value='0' size='20'>Chọn trường</option>";
			
			$chontr=0;
			if(isset($_REQUEST['chontr']))
							{
					$chontr= $_REQUEST['chontr'];
			}
			$tr=get_trp($chonpx);
			
			while($rowtr=mysql_fetch_array($tr))
			{
				if($chontr==$rowtr['IDTR'])
					{
						echo "<option value='".$rowtr['IDTR']."' selected='selected' >".$rowtr['TENTR']."</option>";
					}else {
						echo "<option value='".$rowtr['IDTR']."'>".$rowtr['TENTR']."</option>";
					}
			}
			
		
		echo"</select></td>";
		//giá
		
		
		echo"<td><select id='combo_se' name='chongi' onchange='submit(),listgi()'>
		<option value='0' size='20'>Chọn giá phòng</option>";
			
			$chongi=0;
			if(isset($_REQUEST['chongi']))
							{
					$chongi= $_REQUEST['chongi'];
			}
			
					
					echo"<option value='1' "; if($chongi==1) echo"selected='selected'"; echo">400.000- 600.000</option>
					<option value='2' "; if($chongi==2) echo"selected='selected'"; echo">700.000-1.000.000</option>
					<option value='3'";  if($chongi==3) echo"selected='selected'"; echo"> Trên 1.000.000</option>";
			
			
		
		echo"</select></td></tr>";
		//loại phòng
		
		echo"<tr ><td width='150px' colspan='2'><select id='combo_se' name='chonlp' onchange='submit(),listlp()' >
		<option value='0' size='35'>Chọn loại phòng</option>";
			$chonlp=0;
			if(isset($_REQUEST['chonlp']))
							{
					$chonlp= $_REQUEST['chonlp'];
			}
			echo "<option value='1' "; if($chonlp==1) echo"selected='selected'"; echo">2 người</option>
			<option value='2' "; if($chonlp==2) echo"selected='selected'"; echo">3 người</option>
			<option value='3' "; if($chonlp==3) echo"selected='selected'"; echo"> Trên 3 người</option>";
		
		echo"</select></td>
		<td width='150px'><input type='button' name='timkiem' value='tìm kiếm'  onclick='javascript:SearchT(".$chontp.",".$chonqh.",".$chonpx.",".$chondp.",".$chontr.",".$chongi.",".$chonlp.");'/></td>
		</tr></table>";
		echo "</form></div>";
?>