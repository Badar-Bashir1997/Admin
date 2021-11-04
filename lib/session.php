<?php
	session_start();
	if (!isset($_SESSION['SESS_ID']))
	{
		header("Location: login.php");
		exit;
	}
	if (!isset($_SESSION['SESS_Name']))
	{
		
		header("Location: login.php");
		exit;
	}
	if (!isset($_SESSION['SESS_img']))
	{
		
		header("Location: login.php");
		exit;
	}
?>