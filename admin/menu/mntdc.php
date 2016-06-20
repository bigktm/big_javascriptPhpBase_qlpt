<?php 
require 'ham.php';
if(!isset($_SESSION['currUser']))
{
	header("location:index.php");
}
if(isset($_GET['mn1']))
{
	$mn1 = $_GET['mn1'];
}else {
	$mn1 ="";
}
?>
	<ul id="menutrai">
		<li <?php echo ($mn1=="tp") ? " class='menuchon' ":"" ; ?> ><a href="?option=qldc&mn1=tp">QL THÀNH PHỐ</a></li>
		<li <?php echo ($mn1=="qh") ? " class='menuchon' ":"" ; ?> ><a href="?option=qldc&mn1=qh">QL QUẬN / HUYỆN</a></li>
		<li <?php echo ($mn1=="px") ? " class='menuchon' ":"" ; ?> ><a href="?option=qldc&mn1=px">QL PHƯỜNG / XÃ</a></li>
		<li <?php echo ($mn1=="d") ? " class='menuchon' ":"" ; ?> ><a href="?option=qldc&mn1=d">QL ĐƯỜNG</a></li>
		<li <?php echo ($mn1=="t") ? " class='menuchon' ":"" ; ?> ><a href="?option=qldc&mn1=t">QL TRƯỜNG</a></li>
	</ul>
	
	