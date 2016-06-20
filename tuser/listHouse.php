<?php
	include("connect.php");
	require"function.php";
			$sql_ds=dsnhatro();
	
			$q_dsa=mysql_query($sql_ds);
			$rec_limit_ds = 10;
			$rec_count_ds= mysql_num_rows($q_dsa);
			//echo $rec_count_ds ;
			$rec_count_ds = floor($rec_count_ds/$rec_limit_ds) + 1;
			//echo $rec_count_ds ;
			if( isset($_GET{'page_ds'})|| $page_ds != 0 )
			{
				$page_ds = $_GET{'page_ds'};
				if($page_ds != 0)
				{
					$offset_ds = ($rec_limit_ds * $page_ds) - ($rec_limit_ds);
				}
			}
			else
			{
				$page_ds = 0;
				$offset_ds = 0;
			}
			///////////
		$q_ds=mysql_query($sql_ds." LIMIT $offset_ds, $rec_limit_ds");
		if(! $q_ds )
		{
			die('Không lấy được dữ liệu: ' . mysql_error());
		}
		echo "<div id='phantrang' align='center'><table border='1' >
			<tr width='98%' ><td align='center' colspan='3' ><h3>Danh sách các nhà trọ</h3></td></tr>
			  <tr width='98%' bgcolor='gray' align='center'>
				  <td width='5%'>STT</td> 
				  <td width='20%'>Tên Chủ Trọ</td> 
				  <td width='20%'>Địa Chỉ</td></tr>";
				  
		$dem=$offset_ds + 1;
		while($row_ds=mysql_fetch_array($q_ds))
		{
			$tend=get_d($row_ds['IDD']);
			$tenpx=get_px($row_ds['IDPX']);
			$tenqh=get_qh($row_ds['IDPX']);
			//echo $row_ds['MAD'];
			//echo $row_ds['MAPX'];
			echo "<tr bgcolor='#fffff0' ><td align='center'> ".$dem."</td>
				<td align='center'><a href='#' onclick='detailHouse(".$page_ds.",".$row_ds['nit'].");'>".$row_ds['nit']."</a></td>
				<td align='center'>".$row_ds['MOTADIACHI'].",".$tend.",".$tenpx.",".$tenqh.",Tp Đà Nẵng.</td>
				</tr>";
				$dem++;
		}
		echo "<tr>
				<td colspan=3 align='center' style='background-color: #3cb642;'>";
				if( $page_ds > 1)
				{
					echo "<a href='#' onclick='javascript:loadXMLDoc($page_ds - 1);'>Trước</a>";
				}
				 for ($i_ds=1 ; $i_ds<=$rec_count_ds ; $i_ds++)
				 {
					if ($i_ds == $page_ds) 
					{
					   echo "<span style='color:red;'>[<u>".$i_ds."</u>]</span>";
					   
					} 
					else 
					{
					   echo "<a href='#' onclick='javascript:loadXMLDoc($i_ds);'>[".$i_ds."] </a> ";
					   
					}
				 }
				if( $page_ds < $rec_count_ds)
				{
					echo "<a href='#' onclick='javascript:loadXMLDoc($page_ds + 1);'>Sau</a>";
				}
	
			echo "</td></tr></table></div>";
?>