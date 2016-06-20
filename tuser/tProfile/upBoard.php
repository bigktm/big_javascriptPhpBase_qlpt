<?php
//echo $_SESSION['currUser']."fhdfh";
include("connect.php");

		$upr_dientich="null";
		$upr_loai="";
		$upr_gia="null";
		$upr_tinhtrang="";
		$upr_chuthich="";
		$upr_idpt="null";
		$upr_idnt="null";
		$stt="";
		
		$upr_dientich=$_REQUEST['ub_dientich'];
		$upr_loai=$_REQUEST['ub_loai'];
		$upr_gia=$_REQUEST['ub_gia'];
		$upr_tinhtrang=$_REQUEST['ub_tinhtrang'];
		$upr_chuthich=$_REQUEST['ub_chuthich'];
		$upr_idpt=$_REQUEST['ub_idpt'];
		$upr_idnt=$_REQUEST['ub_idnt'];
		if($upr_tinhtrang==0){$stt=$stt."Chưa Thuê";}
		else{$stt=$stt."Đã Thuê";}
		echo "Mã phòng:&nbsp".$upr_idpt."<br/>";
		echo "Diện tích:&nbsp".$upr_dientich."<br/>";
		echo "Loại phòng:&nbsp".$upr_loai."<br/>";
		echo "Giá:&nbsp".$upr_gia."<br/>";
		echo "Tình Trạng:&nbsp".$stt."<br/>";
		echo "Chú thích:&nbsp".$upr_chuthich."<br/>";
	if (! $_REQUEST['ub_idpt'] || ! $_REQUEST['ub_dientich'] || ! $_REQUEST['ub_loai'] || 
	! $_REQUEST['ub_gia'] || ! $_REQUEST['ub_chuthich'])
	 {
		echo "Vui lòng nhập đầy đủ thông tin! <br/>
		<input type='button' value='Quay lại' onclick='dsPhong(".$upr_idnt.");'/></pre></div>";	
			
	}else{
		$upr_dientich=$_REQUEST['ub_dientich'];
		$upr_loai=$_REQUEST['ub_loai'];
		$upr_gia=$_REQUEST['ub_gia'];
		$upr_tinhtrang=$_REQUEST['ub_tinhtrang'];
		$upr_chuthich=$_REQUEST['ub_chuthich'];
		$upr_idpt=$_REQUEST['ub_idpt'];
		
			//echo $upr_ten;
		//echo $upr_pass;
		//echo $upr_tuoi;
		//echo $upr_cmnd;
		//echo $upr_email;
		//echo $upr_sdt;
			$h="UPDATE phongtro SET DT=".$upr_dientich.", LOAI='".$upr_loai."', GIA=".$upr_gia." , TINHTRANG=".$upr_tinhtrang.", CHUTHICH='".$upr_chuthich."' WHERE IDPT=".$upr_idpt;
			//echo $h;
			mysql_query($h);
			echo "Cập nhật thành công!<br/>
			<input type='button' value='Quay lại' onclick='dsPhong(".$upr_idnt.");'/></pre></div>";
}
?>