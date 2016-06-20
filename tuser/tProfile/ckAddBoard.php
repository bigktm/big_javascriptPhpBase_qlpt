<?php

//echo $_SESSION['currUser']."fhdfh";
include("connect.php");
		$hs_idpt="null";
		$hs_dt="null";
		$loai="null";
		$hs_loai="";
		$hs_gia="null";
		$hs_chuthich="";
		$hs_tt="null";
		$hs_idnt="null";
		
		$hs_idnt=$_REQUEST['ck_idnt'];
		$hs_idpt=$_REQUEST['ck_idpt'];
		$hs_dt=$_REQUEST['ck_dientich'];
		$loai=$_REQUEST['ck_loai'];
		$hs_gia=$_REQUEST['ck_gia'];
		$hs_chuthich=$_REQUEST['ck_chuthich'];
		$hs_tt=$_REQUEST['ck_tinhtrang'];
		echo $hs_idnt."/";
		echo $hs_idpt."/";
		echo $hs_dt."/";
		echo $loai."/";
		echo $hs_gia."/";
		echo $hs_chuthich."/";
		echo $hs_tt."/";
		if($loai==2)
		{$hs_loai=$hs_loai."2 người";}
		elseif($loai==3)
		{$hs_loai=$hs_loai."3 người";}
		else
		{$hs_loai=$hs_loai."4 người";}
						
	if($hs_idnt=="null" || $hs_idpt=="null" || $hs_dt=="null" || $hs_gia=="null" || $hs_chuthich=="" || $hs_tt=="null" || $loai=="null")
	{
		echo "Vui lòng nhập đầy đủ thông tin! <br/>";
		require"addHBoard.php";
	}else{
					
						
						$g="INSERT INTO phongtro (IDPT, DT, LOAI, GIA, IDNT, CHUTHICH, TINHTRANG)  VALUES (".$hs_idpt.",".$hs_dt.",'".$hs_loai."',".$hs_gia.",".$hs_idnt.",'".$hs_chuthich."',".$hs_tt.")";
						mysql_query($g);
						echo $g."Thêm phòng trọ mới thành công!";
							require"addHBoard.php";
	}

?>					
						
						
						
						
						
						