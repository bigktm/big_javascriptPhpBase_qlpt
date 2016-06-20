<?php
//echo $_SESSION['currUser']."fhdfh";
include("connect.php");

		$upr_ten="";
		$upr_pass="";
		$upr_nit="";
		$upr_tuoi="null";
		$upr_email="";
		$upr_sdt="";
		$upr_trt="null";
		$upr_cmnd="";
		$upr_tdk="null";
		$upr_idnt="null";
		$upr_tdv="null";
		$upr_mtdc="";
		$upr_maqh="null";
		$upr_matp="null";
		$upr_mapx="null";
		$upr_mad="null";
		
		
		/*$upr_ten=$_REQUEST['up_ten'];
		$upr_pass=$_REQUEST['up_pass'];
		$upr_nit=$_REQUEST['up_nit'];
		$upr_tuoi=$_REQUEST['up_tuoi'];
		$upr_email=$_REQUEST['up_email'];
		$upr_sdt=$_REQUEST['up_sdt'];
		$upr_trt=$_REQUEST['up_trt'];
		$upr_cmnd=$_REQUEST['up_cmnd'];
		$upr_tdk=$_REQUEST['up_tdk'];
		$upr_idnt=$_REQUEST['up_idnt'];
		$upr_tdv=$_REQUEST['up_tdv'];
		$upr_mtdc=$_REQUEST['up_mtdc'];
		$upr_maqh=$_REQUEST['up_maqh'];
		$upr_matp=$_REQUEST['up_matp'];
		$upr_mapx=$_REQUEST['up_mapx'];
		$upr_mad=$_REQUEST['up_mad'];
		
	
		//fghgfhg
		echo $upr_ten."<br/>";
		echo $upr_nit."<br/>";
		echo $upr_pass."<br/>";
		echo $upr_trt."<br/>";
		echo $upr_tuoi."<br/>";
		echo $upr_cmnd."<br/>";
		echo $upr_email."<br/>";
		echo $upr_sdt."<br/>";
		echo $upr_idnt."<br/>";
		echo $upr_tdk."<br/>";
		echo $upr_tdv."<br/>";
		echo $upr_mtdc."<br/>";
		echo $upr_matp."<br/>";
		echo $upr_mapx."<br/>";
		echo $upr_mad."<br/>";
		echo $upr_maqh."<br/>";*/
		
		
		
if ( ! $_REQUEST['up_ten'] || ! $_REQUEST['up_pass'] || ! $_REQUEST['up_tuoi'] || ! $_REQUEST['up_email'] ||
	 ! $_REQUEST['up_sdt'] || ! $_REQUEST['up_nit'] || ! $_REQUEST['up_cmnd'] ||
	  ! $_REQUEST['up_idnt'] || ! $_REQUEST['up_tdk'] || ! $_REQUEST['up_tdv'] || ! $_REQUEST['up_mad'] || 
	  ! $_REQUEST['up_mtdc'] || ! $_REQUEST['up_mapx'] || ! $_REQUEST['up_maqh'] || ! $_REQUEST['up_matp'])
    {
		echo "Vui lòng nhập đầy đủ thông tin! <br/>";
		require"profile.php";
	}else{
		$upr_ten=$_REQUEST['up_ten'];
		$upr_pass=$_REQUEST['up_pass'];
		$upr_nit=$_REQUEST['up_nit'];
		$upr_tuoi=$_REQUEST['up_tuoi'];
		$upr_email=$_REQUEST['up_email'];
		$upr_sdt=$_REQUEST['up_sdt'];
		$upr_trt=$_REQUEST['up_trt'];
		$upr_cmnd=$_REQUEST['up_cmnd'];
		$upr_tdk=$_REQUEST['up_tdk'];
		$upr_idnt=$_REQUEST['up_idnt'];
		$upr_tdv=$_REQUEST['up_tdv'];
		$upr_mtdc=$_REQUEST['up_mtdc'];
		$upr_maqh=$_REQUEST['up_maqh'];
		$upr_matp=$_REQUEST['up_matp'];
		$upr_mapx=$_REQUEST['up_mapx'];
		$upr_mad=$_REQUEST['up_mad'];
		
	
		//fghgfhg
		//echo $upr_ten;
		//echo $upr_pass;
		//echo $upr_tuoi;
		//echo $upr_cmnd;
		//echo $upr_email;
		//echo $upr_sdt;
		//echo $upr_trt;
		//echo $upr_nit;
		//echo $upr_idnt;
		//echo $upr_tdk;
		//echo $upr_tdv;
		//echo $upr_mtdc;
		//echo $upr_matp;
		//echo $upr_mapx;
		//echo $upr_mad;
		//echo $upr_maqh;
		//thực hiện update
		
			$h="UPDATE chutro SET pass='".$upr_pass."', TEN='".$upr_ten."', TUOI=".$upr_tuoi." , CMND='".$upr_cmnd."', TT=".$upr_trt.", SDT='".$upr_sdt."' ,EMAIL='".$upr_email."' WHERE nit='".$upr_nit."'";
			//echo $h;
			mysql_query($h);
			$g="UPDATE nhatro SET MOTADIACHI='".$upr_mtdc."', IDD=".$upr_mad.", IDPX=".$upr_mapx.", TDV=".$upr_tdv." ,TDK=".$upr_tdk." WHERE IDNT=".$upr_idnt;
			//echo $g;
			mysql_query($g);
		echo "Cập nhật thành công!";
			require"profile.php";
}
?>