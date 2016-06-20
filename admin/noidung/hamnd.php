<?php
if(!isset($_SESSION['currUser']))
{
	header("location:index.php");
}

	mysql_connect("localhost","root","") or die("không thể kết nối database");
	mysql_selectdb("qlpt");
	mysql_query("SET NAMES 'utf8'");
	// ham load ban thanh pho
	function get_tp()
	{
		$tp=mysql_query("SELECT * FROM thanhpho");
		return $tp;
	}
	function get_idtp($idtp0)//
	{
		$idtp=mysql_query("SELECT * FROM thanhpho where IDTP ='".$idtp0."'");
		$rowtp=mysql_fetch_array($idtp);
		return $rowtp;
	}
	function them_tp($themtp)
	{
		mysql_query("insert into thanhpho(TENTP) values('".$themtp."')");
	}
	function sua_tp($suatentp,$suaid)
	{
		mysql_query("UPDATE thanhpho SET TENTP='".$suatentp."' WHERE IDTP='".$suaid."'");
	}
	function xoa_tp($xoatp)
	{
		mysql_query("DELETE FROM thanhpho WHERE IDTP='$xoatp'");
	}
	// quan huyen
	function get_qh($idtp)
	{
		$qh=mysql_query("SELECT * FROM quanhuyen inner join thanhpho where thanhpho.IDTP=quanhuyen.IDTP AND thanhpho.IDTP='$idtp'");
		return $qh;
	}
	function them_qh($idtp,$themqh)
	{
		mysql_query("insert into quanhuyen(TENQH,IDTP) values(N'".$themqh."',".$idtp.")");
		
	}
	function xoa_qh($xoaqh)
	{
		mysql_query("DELETE FROM quanhuyen WHERE IDQH='$xoaqh'");
	}
	function sua_qh($suatenqh,$suaid)
	{
		mysql_query("UPDATE quanhuyen SET TENQH='".$suatenqh."' WHERE IDQH='".$suaid."'");
	}
	function get_idqh($idqh0)//
	{
		$idqh=mysql_query("SELECT * FROM quanhuyen where IDQH ='".$idqh0."'");
		$rowqh=mysql_fetch_array($idqh);
		return $rowqh;
	}
	// get phuong xa
	function get_px($idqh)
	{
		$px=mysql_query("SELECT * FROM phuongxa where IDQH='$idqh'");
		return $px;
	}
	function them_px($idqh,$thempx)
	{
		mysql_query("insert into phuongxa(TENPX,IDQH) values(N'".$thempx."',".$idqh.")");
	
	}
	function sua_px($suatenpx,$suaid)
	{
		mysql_query("UPDATE phuongxa SET TENPX='".$suatenpx."' WHERE IDPX='".$suaid."'");
	}
	function xoa_px($xoapx)
	{
		mysql_query("DELETE FROM phuongxa WHERE IDPX='$xoapx'");
	}
	
	//duong
	function get_duong($idtp)
	{
		$duong=mysql_query("SELECT d.TEND,tp.TENTP,d.IDD FROM duong as d inner join thanhpho as tp on d.IDTP=tp.IDTP WHERE tp.IDTP='$idtp'");
		return $duong;
	}
	function sua_duong($suatenduong,$idd)
	{
		$duong=mysql_query("UPDATE duong SET TEND='".$suatenduong."' WHERE IDD='".$idd."'");
	}
	function get_duongquan($idtp,$idd)
	{
		$duongquan=mysql_query("SELECT qh.TENQH,qh.IDQH FROM duong as d inner join duongvaphuongxa as dvpx on d.IDD=dvpx.IDD
				inner join phuongxa as px on px.IDPX=dvpx.IDPX
				inner join quanhuyen as qh on qh.IDQH=px.IDQH
				WHERE	qh.IDTP='$idtp' AND d.IDD='$idd'
				GROUP BY qh.TENQH,qh.IDQH
				");
				return $duongquan;
	}
	function get_duongphuong($idqh,$idd)
	{
		$duongphuong=mysql_query("SELECT px.TENPX FROM duong as d inner join duongvaphuongxa as dvpx on d.IDD=dvpx.IDD
				inner join phuongxa as px on px.IDPX=dvpx.IDPX
				WHERE	px.IDQH='$idqh' AND d.IDD='$idd'
				GROUP BY px.TENPX
				");
				return $duongphuong;
	}
	function get_tenduong($idd)
	{
		$tenduong=mysql_query("SELECT TEND FROM duong WHERE	IDD='$idd'");
				return $tenduong;
	}
	
	function get_checkpx($idpx,$idd)
	{
		$checkpx=mysql_query("SELECT * FROM duongvaphuongxa WHERE IDPX='$idpx' AND IDD='$idd'");
		return $checkpx;
	}
	function insetpx($checkpx,$idd,$chonqh)
	{
		$insetpx="insert into duongvaphuongxa(IDD,IDPX) values ";
		
		$c=count($checkpx);
		if($checkpx!=0)
		{
			foreach( $checkpx as $value )
			{
				//echo $value.",$c-> ".$idd;
				if($c!=1)
				{
					$insetpx = $insetpx ."('$idd','$value'),";
				}else
				{
					$insetpx = $insetpx . "('$idd','$value')";
				}
				$c--;
			}
			$k=mysql_query("SELECT * FROM phuongxa as px inner join duongvaphuongxa as dvpx on px.IDPX=dvpx.IDPX WHERE px.IDQH='$chonqh' AND dvpx.IDD='$idd'");
			while($row=mysql_fetch_array($k))
			{
				mysql_query("DELETE FROM duongvaphuongxa WHERE IDD='$row[3]' AND IDPX='$row[4]'");
			}
			
			mysql_query("$insetpx");
			
		}else 
		{
			$k=mysql_query("SELECT * FROM phuongxa as px inner join duongvaphuongxa as dvpx on px.IDPX=dvpx.IDPX WHERE px.IDQH='$chonqh'");
			while($row=mysql_fetch_array($k))
			{
				mysql_query("DELETE FROM duongvaphuongxa WHERE IDD='$row[3]' AND IDPX='$row[4]'");
			}
		}
	}
	function is_sl($tendnew,$idtp)
	{
		mysql_query("insert into duong(TEND,IDTP) values('".$tendnew."','".$idtp."')");
		$idduong=mysql_query("SELECT * FROM duong WHERE TEND='$tendnew' AND IDTP=$idtp");
		return $idduong;
	}
	function xoa_d($idd)
	{
		mysql_query("DELETE FROM duong WHERE IDD='$idd'");
	}
	//truong
	function get_truong($idtp)
	{
		$truong=mysql_query("SELECT tp.TENTP,qh.TENQH,px.TENPX,d.TEND,t.IDT,t.TEN,t.DIACHIMOTA FROM duong as d inner join truong as t on d.IDD=t.IDD
				inner join phuongxa as px on px.IDPX=t.IDPX
				inner join quanhuyen as qh on qh.IDQH=px.IDQH
				inner join thanhpho as tp on qh.IDTP=tp.IDTP
				WHERE tp.IDTP='$idtp'");
		return $truong;
	}
	function get_tdxht($idt,$idtp)
	{
		$tentruong=mysql_query("SELECT qh.IDQH,px.IDPX,d.IDD,t.TEN,t.DIACHIMOTA FROM duong as d inner join truong as t on d.IDD=t.IDD
				inner join phuongxa as px on px.IDPX=t.IDPX
				inner join quanhuyen as qh on qh.IDQH=px.IDQH
				inner join thanhpho as tp on qh.IDTP=tp.IDTP
				WHERE tp.IDTP='$idtp' AND t.IDT='$idt'");
		return $tentruong;
	}
	function get_tentruong($tent)
	{
		$tentruong=mysql_query("SELECT TEN FROM truong WHERE TEN='$tent'");
		return $tentruong;
	}
	function sua_t($suatent,$idd,$idpx,$idt,$sonha)
	{
		mysql_query("UPDATE truong SET TEN='".$suatent."',IDD='".$idd."',IDPX='".$idpx."',DIACHIMOTA='".$sonha."' WHERE IDT='".$idt."'");
	}
	function then_truong($themtent,$idd,$idpx)
	{
		mysql_query("insert into truong(TEN,IDD,IDPX) values('".$themtent."','".$idd."','".$idpx."')");
	}
	function xoa_t($idt)
	{
		mysql_query("DELETE FROM truong WHERE IDT='$idt'");
	}
?>