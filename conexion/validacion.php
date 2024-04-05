<?php
    session_start();
	$login_ok = isset($_SESSION['login']) ? $_SESSION['login'] : null;
	if ($login_ok != "ok")
	{
//		header("Location:index.php");
	}
?>
