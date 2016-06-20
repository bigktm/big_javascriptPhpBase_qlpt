

<?php
session_start();
if(isset($_SESSION['currUser']) || isset($_REQUEST['user_log']))
{	
	if(isset($_SESSION['currUser']))
	{
		if(($_SESSION['currUser']=='big') or ($_SESSION['currUser']=='gis'))
		{
						echo "<div class='login'>Admin:&nbsp".$_SESSION['currUser']."&nbsp|&nbsp<a href='#' onclick='javascript:logout();'>Logout</a></div>";
						echo "<div class='menu'>";require"menu_cont.php";
						echo"</div>";
		}
		else
		{
						echo "<div class='login'>User:&nbsp".$_SESSION['currUser']."&nbsp|&nbsp<a href='#' onclick='javascript:logout();'>Logout</a></div>";
						echo "<div class='menu'>";require"menu_cont.php";
						echo"</div>";
		}
	}
	if(isset($_REQUEST['user_log']))
	{	
		if(($_REQUEST['user_log']=='big') or ($_REQUEST['user_log']=='gis'))
		{
						echo "<div class='login'>Admin:&nbsp".$_REQUEST['user_log']."&nbsp|&nbsp<a href='#' onclick='javascript:logout();'>Logout</a></div>";
						echo "<div class='menu'>";require"menu_cont.php";
						echo"</div>";
		}
		else
		{
						echo "<div class='login'>User:&nbsp".$_REQUEST['user_log']."&nbsp|&nbsp<a href='#' onclick='javascript:logout();'>Logout</a></div>";
						echo "<div class='menu'>";require"menu_cont.php";
						echo"</div>";
		}
	}
}else
{
					echo"<form action='' method='post' align='right'>
						<b>Tài Khoản: &nbsp </b><input id='user' type='text' size='10' name='user' />&nbsp&nbsp
						<b>Mật Khẩu: &nbsp </b><input id='pass' type='password' size='10' name='pass' />&nbsp&nbsp
						<a href='#' onclick='login(),reloadcont_ri_bot();'/>Đăng Nhập</a>|
						<a href='#' onclick='register(),reloadbanner();'/>Đăng ký</a>
					</form>";
					
				echo "<div class='menu_s' align='center'>";require"menu_cont.php";
					echo"</div>";
				
}
?>