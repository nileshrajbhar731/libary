<?php
	session_start();
	if(isset($_SESSION['login_Admin']))
	{
		unset($_SESSION['login_Admin']);
	}
	header("location:index.php");
?>