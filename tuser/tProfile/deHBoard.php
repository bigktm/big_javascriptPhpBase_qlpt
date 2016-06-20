<?php

include("connect.php");
function xoaB($B)
	{
		mysql_query("DELETE FROM phongtro WHERE IDPT=".$B);
	}
	function sapxepB()
	{
		$q_us = mysql_query("SELECT * FROM phongtro");
		//$machua=mysql_num_rows($q_chua);
		$i=1;
		while($r_us=mysql_fetch_array($q_us))
		{
			if($r_us['IDPT']!=$i)
			{
				mysql_query("UPDATE phongtro SET IDPT=".$i." WHERE IDPT=".$r_us['IDPT']);
			}
			$i++;
		}
	}

	//thực hiện xóa 
	if(isset($_REQUEST['mabo']))
		{
			$de_mapb=$_REQUEST['mabo'];
		}
		if(isset($_REQUEST['mant']))
		{
			$de_mant=$_REQUEST['mant'];
		}
		xoaB($de_mapb);
		echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbspXóa phòng trọ thành công!";
		echo"<input type='button' value='Quay lại' onclick='dsPhong(".$de_mant.");'/>";
	sapxepB();
?>