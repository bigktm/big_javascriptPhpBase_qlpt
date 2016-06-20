<?php
	mysql_connect("localhost","root","") or die("không kết nối");
	mysql_query("SET NAMES 'UTF8' ");
	mysql_select_db('qlpt')  or die("không kết nối với CSDL");

?>