<?php
include("connect.php");
function getnhatro($mapt)
		 {
			$str="select * from phongtro where IDPT=".$mapt;
			$qstr=mysql_query($str);
			while($row = mysql_fetch_array($qstr))
			{
			return getnit($row['IDNT']);
			}
		 }
function getnit($mant)
		 {
			
			$strr="select * from nhatro where IDNT=".$mant;
			$qstrr=mysql_query($strr);
			while($rowr = mysql_fetch_array($qstrr))
			{
			return getchuT($rowr['nit']);
			}
		 }
 function getchuT($nit)
		 {
			
			$stry="select * from chutro where nit like '".$nit."'";
			$qstry=mysql_query($stry);
			while($rowy = mysql_fetch_array($qstry))
			{
			return $rowy['TEN'];
			}
		 }
	$sql_ds="select * from anh";
	
			$q_dsa=mysql_query($sql_ds);
			$page_ds = 0;
			$rec_limit_ds = 12;
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
				$page_ds = 1;
				$offset_ds = 0;
			}
			///////////
		$q_ds=mysql_query($sql_ds." LIMIT $offset_ds, $rec_limit_ds");
	if(! $q_ds )
		{
			die('Không lấy được dữ liệu: ' . mysql_error());
		}
		echo "<div id='cont_index'><div id='dsanh' align='center'><br/><b>Danh sách ảnh các nhà trọ</b></div>";
		while($row_ds=mysql_fetch_array($q_ds))
		{
			$tenchuT=getnhatro($row_ds['IDPT']);
			echo"<div id='anh'><img src='timages/".$row_ds['LINK']."' /><div class='tenchua' align='center'>".$tenchuT."</div></div>";
		}
		echo "</div><div id='loadImg' align='center'>";
				if( $page_ds > 1)
				{
					echo "<a href='#' onclick='javascript:loadImage($page_ds - 1);'>Trước</a>";
				}
				 for ($i_ds=1 ; $i_ds<=$rec_count_ds ; $i_ds++)
				 {
					if ($i_ds == $page_ds) 
					{
					   echo "<span style='color:red;'>[<u>".$i_ds."</u>]</span>";
					   
					} 
					else 
					{
					   echo "<a href='#' onclick='javascript:loadImage($i_ds);'>[".$i_ds."] </a> ";
					   
					}
				 }
				if( $page_ds < $rec_count_ds)
				{
					echo "<a href='#' onclick='javascript:loadImage($page_ds + 1);'>Sau</a>";
				}
	
			echo "</div>";
?>