<?php
	include("connect.php");
	require"function.php";
	$mac="";
	$page="";
	if(isset($_REQUEST['nit']))
	{
		$mac=(int)$_REQUEST['nit'];
	}
	if(isset($_REQUEST['page']))
	{
		$page=(int)$_REQUEST['page'];
	}
	
	$q_ds=mysql_query("select * from nhatro where nit = ".$mac);
		if(! $q_ds )
		{
			die('Không lấy được dữ liệu: ' . mysql_error());
		}
	while($row_ds=mysql_fetch_array($q_ds))
		{
			$tend=get_d($row_ds['IDD']);
			$tenpx=get_px($row_ds['IDPX']);
			$tenqh=get_qh($row_ds['IDPX']);
			//echo $row_ds['MAD'];
			//echo $row_ds['MAPX'];
			echo "<div align='center'><table bgcolor='#fffff0' >
				<tr><td colspan=2 align='center' ><h2><b>Thông tin chi tiết</b></h2></td></tr>
				<tr><td align='left'>Tài Khoản Chủ Trọ:</td><td>".$row_ds['nit']."</td></tr>
				<tr><td align='left'>Trụ Trì:</td><td>".$row_ds['TRUTRI']."</td></tr>
				<tr><td align='left'>Số Phật Tử:</td><td> ".$row_ds['SOPHATTU']."</td></tr>
				<tr><td align='left'>Địa Chỉ:</td><td> ".$row_ds['MOTADIACHI'].",&nbsp".$tend.",&nbsp".$tenpx.",".$tenqh.",Tp Đà Nẵng.</td></tr>
				<tr><td align='left'>SĐT:</td><td> ".$row_ds['SDT']."</td></tr>
				<tr><td align='left'>Tọa độ:</td><td> ".$row_ds['TDV'].",".$row_ds['TDK']."</td></tr>
				<tr><td align='left'>Chú Thích:</td><td><textarea id='hs_tieusu' name='hs_tieusu' cols=68 rows=10>".$row_ds['CHUTHICH']."</textarea></td></tr>
				</tr></table>";
				echo"<pre>                   <input type='button' value='Quay lại' onclick='loadXMLDoc(".$page.");'/></pre></div>";	
				
		}
		
?>