<?php
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
	mysql_connect("localhost","root","") or die("không thể kết nối database");
	mysql_selectdb("qlpt");
	mysql_query("SET NAMES 'utf8'");
	//thanhpho
	function get_tp()
	{
		$tp=mysql_query("SELECT * FROM thanhpho");
		return $tp;
	}
	//quanghuyen
	function get_qh($idtp)
	{
		$qh=mysql_query("SELECT * FROM quanhuyen inner join thanhpho where thanhpho.IDTP=quanhuyen.IDTP AND thanhpho.IDTP='$idtp'");
		return $qh;
	}
	
	//phuong xa
	function get_px($idqh)
	{
		$px=mysql_query("SELECT * FROM phuongxa where IDQH='$idqh'");
		return $px;
	}
	//user
	function get_user($chuoi,$chuoi1)
	{
		if($chuoi=="")
		{
			$user=mysql_query("SELECT * FROM chutro".$chuoi1);
			return $user;
		}else 
		{
			$mjbds="SELECT * FROM chutro ct,(SELECT nhatro.nit FROM nhatro ".$chuoi." group by nhatro.nit) k Where k.nit=ct.nit";
			//$chuoi="SELECT nhatro.nit FROM nhatro ".$chuoi." group by nhatro.nit";
			$user=mysql_query($mjbds);
			return $user;
		}
	}
	function get_usernt($nit)
	{
		$get_idct=mysql_query("SELECT * FROM chutro WHERE nit='$nit'");
		return $get_idct;
	}
	//ngoai le
	function get_duong($idtp)
	{
		$duong=mysql_query("SELECT d.TEND,tp.TENTP,d.IDD FROM duong as d inner join thanhpho as tp on d.IDTP=tp.IDTP WHERE tp.IDTP='$idtp'");
		return $duong;
	}
	function get_truong($idtp)
	{
		$truong=mysql_query("SELECT tp.TENTP,qh.TENQH,px.TENPX,d.TEND,t.IDT,t.TEN FROM duong as d inner join truong as t on d.IDD=t.IDD
				inner join phuongxa as px on px.IDPX=t.IDPX
				inner join quanhuyen as qh on qh.IDQH=px.IDQH
				inner join thanhpho as tp on qh.IDTP=tp.IDTP
				WHERE tp.IDTP='$idtp'");
		return $truong;
	}
	//timkiemtext
	function timkiemtext($keyword)
	{
		$tp=mysql_query("SELECT * FROM thanhpho WHERE TENTP LIKE '%$keyword%'");
		$qh=mysql_query("SELECT * FROM quanhuyen where TENQH LIKE '%$keyword%'");
		$px=mysql_query("SELECT * FROM phuongxa where TENPX LIKE '%$keyword%'");
		$duong=mysql_query("SELECT * FROM duong WHERE TEND LIKE '%$keyword%'");
		$tentruong=mysql_query("SELECT TENTR FROM truong WHERE TENTR LIKE '%$keyword%'");
		$tenban="";
		if(mysql_num_rows($tp) != "" ){$tenban="thanhpho";}
		if(mysql_num_rows($qh) != "" ){$tenban="quanhuyen";}
		if(mysql_num_rows($px) != "" ){$tenban="phuongxa";}
		if(mysql_num_rows($duong) != "" ){$tenban="duong";}
		if(mysql_num_rows($tentruong) != "" ){$tenban="truong";}
		return $tenban;
	}
	function timkiemtextuser($keyword)
	{
		$user=mysql_query("SELECT * FROM chutro WHERE TEN LIKE '%$keyword%' OR nit LIKE '%$keyword%'");
		$tenban="";
		if(mysql_num_rows($user) != "" ){$tenban="chutro";}
		return $tenban;
	}