<?php
	
	
	include("connect.php");
	 function getchuTr($nit)
		 {
			
			$stry="select * from chutro where nit like '".$nit."'";
			$qstry=mysql_query($stry);
			while($rowy = mysql_fetch_array($qstry))
			{
			return $rowy['TEN'];
			}
		 }
	$sql_ds=dsnhatro_b();
	
	$q_dsa=mysql_query($sql_ds);
	if(! $q_dsa )
		{
			die('Không lấy được dữ liệu: ' . mysql_error());
		}
	$dem=1;
	echo "Danh sách nhà trọ:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
	while($row_dsa=mysql_fetch_array($q_dsa))
		{
			$tenchu=getchuTr($row_dsa['nit']);
			echo "".$dem.".&nbsp".$tenchu."&nbsp&nbsp&nbsp";
			$dem++;
			//echo $row_dsa['TENCHUA'];
		}

?>