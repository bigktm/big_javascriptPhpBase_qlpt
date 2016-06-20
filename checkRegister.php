<?php
$hoten = $_GET['hoten']; 
$cmnd = $_GET['cmnd'];
$tennd = $_GET['tennd']; 
$email = $_GET['email'];	
$mk = $_GET['mk'];
$mkk = $_GET['mk'];
$nams =$_GET['nams'];
$sdt =$_GET['sdt'];
$machua =$_GET['machua'];
$themnguoidung = 1; 
echo $tennd;
echo $email;
echo $mk;
echo $nams;
echo $sdt;
echo $hoten;
echo $cmnd;

 if ( ! $tennd || ! $hoten || ! $cmnd || ! $email || ! $mk || $mk !=$mkk || ! $sdt || ! $nams || ! $machua)
    {
		echo "Vui lòng nhập đầy đủ thông tin! <br/>";
		$themnguoidung =0;
	}

if	($themnguoidung ==1)
	{
	require"connect.php";
	//kiểm tra tổng số người dùng
		$q_nd = mysql_query("SELECT * FROM chutro");
		$mand=mysql_num_rows($q_nd);
	//Kiểm tra đã tồn tại email này hay chưa
	$sql = "SELECT * FROM chutro WHERE EMAIL='".$email."'";
	$ketqua = mysql_query($sql);
	//Kiểm tra đã tồn tại người dùng này hay chưa
	$sql_nd = "SELECT * FROM chutro WHERE nit='".$tennd."'";
	$ketqua_nd = mysql_query($sql_nd);
	//echo $sql;
		if (mysql_num_rows($ketqua)>0 )
		{
		echo"Email này đã tồn tại!<br/>";
		}
		else if(mysql_num_rows($ketqua_nd)>0)
		{
		echo"Người dùng này đã tồn tại!<br/>";
		}
		else
		{
			//Thêm vào CSDL
			$mand++;
			//echo $mand;
			$nhatro = mysql_query("select * from nhatro");
			$demnt=mysql_num_rows($nhatro);
			$demnt++;
			$y="insert into chutro(nit, pass, TEN, TUOI, CMND, TT, SDT, EMAIL) values ('".$tennd."','".$mk."','".$hoten."',".$nams.",'".$cmnd."',0,'".$sdt."','".$email."')";
			$x="insert into nhatro(IDNT, MOTADIACHI, IDD, IDPX, TDV, TDK, nit) values (".$demnt.",'null',1,1,16.059459,108.216799,'".$tennd."')";
			mysql_query($y);
			mysql_query($x);
			echo $y,$x;
			
			//kiểm tra dữ liệu đã được chèn vào CSDL chưa
			$sqlnd = "SELECT * FROM chutro WHERE nit='".$tennd."'";
			$ketquand = mysql_query($sqlnd);
			if (mysql_num_rows($ketquand)>0)
				{
				echo"&nbsp&nbsp&nbspChúc mừng <b><span style='color:blue ;'>&nbsp'".$tennd."'&nbsp</span></b> đã đăng ký thành công!";
				}
				else
				echo"Hãy kiểm tra lại thông tin đăng ký!";
		}
	}
	else{
		echo "Chưa đăng ký được!<br/>";
	}


?>