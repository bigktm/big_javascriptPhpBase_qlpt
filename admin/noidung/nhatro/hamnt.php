<?php
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	
	mysql_connect("localhost","root","") or die("không thể kết nối database");
	mysql_selectdb("qlpt");
	mysql_query("SET NAMES 'utf8'");
	function get_nt($chuoi)
	{
		$chuoi="SELECT * FROM nhatro".$chuoi;
		$nt=mysql_query($chuoi);
		return $nt;
	}
	function get_nt1($nit)
	{
		$nt=mysql_query("SELECT * FROM nhatro WHERE nit='$nit'");
		return $nt;
	}
	function get_nt2($idnt)
	{
		$nt=mysql_query("SELECT * FROM nhatro WHERE IDNT='$idnt'");
		return $nt;
	}
	function get_dcnt($IDNT)
	{
		$dcnt=mysql_query("SELECT * FROM nhatro as nt inner join duong as d on d.IDD=nt.IDD
						inner join phuongxa as px on px.IDPX=nt.IDPX
						inner join quanhuyen as qh on qh.IDQH=px.IDQH
						inner join thanhpho as tp on qh.IDTP=tp.IDTP
						WHERE nt.IDNT='$IDNT'");
		return $dcnt;
	}
	
	function get_soluong($IDNT)
	{
		$sum=mysql_query("SELECT * FROM phongtro WHERE IDNT='$IDNT'");
		return $sum;
	}
	function get_pt($IDNT)
	{
		$get_pt=mysql_query("SELECT * FROM phongtro WHERE IDNT=".$IDNT);
		return $get_pt;
	}
	
	