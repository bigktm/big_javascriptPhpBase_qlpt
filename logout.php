
<?php
session_start();
if(isset($_SESSION['currUser']))
{
	unset($_SESSION['currUser']);
	session_destroy();
}
require"formLogin.php";

?>