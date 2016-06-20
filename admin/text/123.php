<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<link rel="stylesheet" type="text/css" href="css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body> 
<?php if(isset($_REQUEST['colors'])){$radio=$_REQUEST['colors'];}else {$radio=1;} ?>
<form method="post" action="" >
    Tìm Kiếm Nhà Trọ Theo:&nbsp&nbsp&nbsp&nbsp
	<input type="radio" name="colors" value="1" onchange="submit()"<?php if($radio=="1") {echo 'checked';}?>> Theo Khu Vực &nbsp&nbsp
	<input type="radio" name="colors" value="2" onchange="submit()"<?php if($radio=="2") {echo 'checked';}?>> Theo Đường &nbsp&nbsp
	<input type="radio" name="colors" value="3" onchange="submit()"<?php if($radio=="3") {echo 'checked';}?>> Theo Trường  &nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp
	<input type="text" name="timkiem" size="40"> <input type="submit" name="tim" value="Tìm Kiếm">
</form>
<?php echo $radio;?>
</body> 
</html>