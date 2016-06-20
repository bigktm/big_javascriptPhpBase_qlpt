
<?php 
	
	if(!isset($_SESSION['currUser']))
	{
		header("location:index.php");
	}
?>
<Div id="trangchutrai">
<table>
	<tr>
		<td><a href="?option=hethong"><img src="img/setting.png" width="100px" height="100px"><br /><center>Cài Đặt Hệ Thống</center></a></td>
		<td><a href="?option=qldc&mn1=dc"><img src="img/diachi.png" height="100px"><br /><center>Quản Lý Khu Vực</center></a></td>
		<td><a href="?option=qldc&mn1=d"><img src="img/duong.png" width="100px" height="100px"><br /><center>Quản Lý Đường</center></a></td>
	</tr>
	<tr>
		<td><a href="?option=qldc&mn1=t"><img src="img/truong.png" width="100px" height="100px"><br /><center>Quản Lý Trường</center></a></td>
		<td><center><a href="?option=qluser"><img src="img/user.png" width="100px" height="100px"><br /><center>Quản Lý USER</center></a></center></td>
		<td><a href="?option=nhatro"><img src="img/nhatro.png" width="100px" height="100px"><br /><center>Quản Lý Nhà Trọ</center></a></td>
	</tr>
</table>
</Div>
<Div id="trangchuphai">
sdxcgbh
</Div>