<?php 
	include("function.php");
	if(isset($_GET['user']) && isset($_GET['pass']))
	{
		$user=$_GET['user'];
		$pass=$_GET['pass'];
		//echo $user,$pass;
		get_user($user,$pass);
	}
?>