<?php
$us = "";
if(isset($_SESSION['currUser']))
{	
	$us = $_SESSION['currUser'];
	if(($_SESSION['currUser']=='big') or ($_SESSION['currUser']=='gis'))
	{
		echo"<h4><a href='#' onclick='reloadcont_ri_bot();'>Trang Chủ</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:loadGT();'>Giới Thiệu</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:manaPago(1);'>Quản lý Chùa</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:manaUser(1);'>Quản lý người dùng</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:manaPlace(1);'>Quản lý khu vực</a>
		</h4>";
	}
	else 
	{
		echo"<h4><a href='#' onclick='reloadcont_ri_bot();'>Trang Chủ</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:loadGT();'>Giới Thiệu</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:loadXMLDoc(1);'>Danh Sách Nhà Trọ</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:upLoad();'>Upload</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:loadhs();'>Hồ sơ cá nhân</a>
		</h4>";
	}
}else
{
	echo"<h4><a href='#' onclick='reloadbanner(),reloadcont_ri_bot();'>Trang Chủ</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:loadGT();'>Giới Thiệu</a>&nbsp|&nbsp
		<a href='#' onclick='javascript:loadXMLDoc(1);'>Danh Sách Nhà Trọ</a></h4>";
}

?>