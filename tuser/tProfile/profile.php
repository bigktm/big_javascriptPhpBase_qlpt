<?php
session_start();
//echo $_SESSION['currUser']."fhdfh";
include("connect.php");
include("function.php");
		$hs_nit="";
		$hs_pass="";
		$hs_passh="";
		$hs_ten="";
		$hs_tuoi="";
		$hs_cmnd="";
		$hs_trt="";
		$hs_email="";
		$hs_sdt="";
		$hs_idnt="";
		$hs_mtdc="";
		$hs_idd="";
		$hs_idpx="";
		$hs_tdk="";
		$hs_tdv="";
		$hs_tend="";
		$hs_tenpx="";
		$hs_idqh="";
		$hs_idtp="";
		
		if(isset($_SESSION['currUser']))
		{
			$hs_nit=$_SESSION['currUser'];
			//echo $hs_nit;
		}
		$hs_sql_mand = mysql_query("SELECT * FROM chutro WHERE nit='".$hs_nit."'");
		while($hs_row_nd=mysql_fetch_array($hs_sql_mand))
		{
			$hs_pass=$hs_row_nd['pass'];
			$hs_ten=$hs_row_nd['TEN'];
			$hs_tuoi=$hs_row_nd['TUOI'];
			$hs_cmnd=$hs_row_nd['CMND'];
			$hs_trt=$hs_row_nd['TT'];
			$hs_sdt=$hs_row_nd['SDT'];
			$hs_email=$hs_row_nd['EMAIL'];
			
		
			
				$hs_sql_machua = mysql_query("SELECT * FROM nhatro WHERE nit='".$hs_nit."'");
				while($hs_row_chua=mysql_fetch_array($hs_sql_machua))
				{
					$hs_idnt=$hs_row_chua['IDNT'];
					$hs_mtdc=$hs_row_chua['MOTADIACHI'];
					$hs_idd=$hs_row_chua['IDD'];
					$hs_idpx=$hs_row_chua['IDPX'];
					$hs_tdk=$hs_row_chua['TDK'];
					$hs_tdv=$hs_row_chua['TDV'];
					//Lấy tên đường và phường xã
					$hs_tend=get_d($hs_idd);
					$hs_tenpx=get_px($hs_idpx);
					$hs_idqh=get_qh($hs_idpx);
					$hs_idtp=get_tp($hs_idd);
				}
			
		}
		//echo "fghfgh".$hs_nams;
		echo"
		
		<div class='hs_user' align='center'>";
			
		echo "
		<table> 
		    <tr>
				<td colspan=4 align='center'><b>Thông tin chủ trọ</b></td>
			</tr>
			<tr>
			`	<td>Tên người dùng:&nbsp&nbsp</td><td><input id='hs_ten' type='text' name='hs_ten' value='".$hs_ten."' /></td>
				<td>Tài khoản:&nbsp&nbsp</td><td><input id='hs_nit' type='text' name='hs_nit' value='".$hs_nit."' disabled/></td>
			</tr>
			<tr>			
				<td>Mật khẩu:&nbsp&nbsp</td><td><input id='hs_pass' type='password' name='hs_pass' value='".$hs_pass."' /></td>
				<td>Trạng Thái:&nbsp&nbsp</td><td><input id='hs_trt' type='text' name='hs_trt' value='".$hs_trt."' /></td>
			</tr>
			<tr>	
				<td>Năm sinh:&nbsp&nbsp</td><td>
				<select name='hs_nsinh' onchange='listnamst(this.value);' >";
				if(isset($_REQUEST['hs_nsinh']))
				{
						$nams= $_REQUEST['hs_nsinh'];
		
				}
				else{$nams=$hs_tuoi;}
				
				for($i=1950;$i<=2030;$i++)
				{
					if($i==$nams)
						{
							echo "<option class='nams' value='".$nams."' selected='selected' >".$nams."</option>";
						}else {
							echo "<option class='".$i."' value='".$i."'>".$i."</option>";
						}
					
				}
				//echo $nams;
				
				echo"</select></td>	
				
				
				
				<td>SĐT người dùng:&nbsp&nbsp</td><td><input id='hs_sdt' type='text' name='hs_sdt' value='".$hs_sdt."' /></td>
			</tr>
			<tr>			
				<td>Email:&nbsp&nbsp</td><td><input id='hs_email' type='text' name='hs_email' value='".$hs_email."' /></td>
				<td>CMND:&nbsp&nbsp</td><td><input id='hs_cmnd' type='text' name='hs_cmnd' value='".$hs_cmnd."' /></td>
			</tr>
			<tr>
				<td colspan=4 align='center'><b>Thông tin Nhà Trọ</b></td>
			</tr>
			<tr>
				<td>Kinh Độ:&nbsp&nbsp</td><td><input id='hs_tdk' type='text' name='hs_tdk' value='".$hs_tdk."' /></td>
				<td>Vỹ Độ:&nbsp&nbsp</td><td><input id='hs_tdv' type='text' name='hs_tdv' value='".$hs_tdv."' /></td>
			</tr>
			<tr>	
				<td>Số nhà/Kiệt:&nbsp&nbsp</td><td><input id='hs_mtdc' type='text' name='hs_mtdc' value='".$hs_mtdc."' /></td>
				<td>Đường:&nbsp&nbsp</td><td>
				<select name='mad' onchange='listduongt(this.value);' style='width:173px;'>";
				if(isset($_REQUEST['mad']))
				{
						$hs_mad_r= $_REQUEST['mad'];
		
				}
				else{$hs_mad_r=$hs_idd;}
				
				$sql_d=dsd();
				$q_d=mysql_query($sql_d);
				echo "<option value=0></option>";
				while($r_d=mysql_fetch_array($q_d))
				{
					if($r_d['IDD']==$hs_mad_r)
						{
							//$tentl=$r_chua['TENCHUA'];
							echo "<option value='".$r_d['IDD']."' selected='selected' >".$r_d['TEND']."</option>";
						}else {
							echo "<option value='".$r_d['IDD']."'>".$r_d['TEND']."</option>";
						}
						
				}
				echo"</select></td>
			</tr>
			<tr>	
				<td>Phường/Xã:&nbsp&nbsp</td><td colspan=3>
				<select name='mapx' onchange='listphuongt(this.value);' style='width:173px;'>";
				if(isset($_REQUEST['mapx']))
				{
						$hs_mapx_r= $_REQUEST['mapx'];
		
				}
				else{$hs_mapx_r=$hs_idpx;}
				$sql_px=dspx();
				$q_px=mysql_query($sql_px);
				echo "<option value=0 ></option>";
				while($r_px=mysql_fetch_array($q_px))
				{
					if($r_px['IDPX']==$hs_mapx_r)
						{
							//$tentl=$r_chua['TENCHUA'];
							echo "<option value='".$r_px['IDPX']."' selected='selected' >".$r_px['TENPX']."</option>";
						}else {
							echo "<option value='".$r_px['IDPX']."'>".$r_px['TENPX']."</option>";
						}
						
				}
				
				echo"</select></td>
			</tr>
			<tr>	
				<td>Quận/Huyện:&nbsp&nbsp</td><td>
				<select name='maqh' onchange='listquant(this.value);' style='width:173px;'>";
				if(isset($_REQUEST['maqh']))
				{
						$hs_maqh_r= $_REQUEST['maqh'];
		
				}
				else{$hs_maqh_r=$hs_idqh;}
				$sql_qh=dsqh();
				$q_qh=mysql_query($sql_qh);
				echo "<option value=0 ></option>";
				while($r_qh=mysql_fetch_array($q_qh))
				{
					if($r_qh['IDQH']==$hs_maqh_r)
						{
							//$tentl=$r_chua['TENCHUA'];
							echo "<option value='".$r_qh['IDQH']."' selected='selected' >".$r_qh['TENQH']."</option>";
						}else {
							echo "<option value='".$r_qh['IDQH']."'>".$r_qh['TENQH']."</option>";
						}
						
				}
				
				echo"</select></td>
				
				<td>Thành Phố:&nbsp&nbsp</td><td colspan=3>
				<select name='matp' onchange='listthanhphot(this.value);' style='width:173px;'>";
				if(isset($_REQUEST['matp']))
				{
						$hs_matp_r= $_REQUEST['matp'];
		
				}
				else{$hs_matp_r=$hs_idtp;}
				$sql_tp=dstp();
				$q_tp=mysql_query($sql_tp);
				echo "<option value=0 ></option>";
				while($r_tp=mysql_fetch_array($q_tp))
				{
					if($r_tp['IDTP']==$hs_matp_r)
						{
							//$tentl=$r_chua['TENCHUA'];
							echo "<option value='".$r_tp['IDTP']."' selected='selected' >".$r_tp['TENTP']."</option>";
						}else {
							echo "<option value='".$r_tp['IDTP']."'>".$r_tp['TENTP']."</option>";
						}
						
				}
				
				echo"</select></td>
			
			</tr>
			</table>";
					
			
				echo"<pre>                  <input type='button' value='Xem phòng trọ' onclick='dsPhong(".$hs_idnt.");'/> <input type='button' value='lưu lại' onclick='updatePr(".$hs_idnt.",".$nams.",".$hs_mapx_r.",".$hs_mad_r.",".$hs_maqh_r.",".$hs_matp_r.")'/></pre>";	
					
			//echo $hs_mad_r;
	
	


?>