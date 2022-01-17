<?php 
session_start();

if (isset($_SESSION['auth']) || isset($_COOKIE['auth2'])) {
	session_destroy();
	if (isset($_COOKIE['auth2'])) {
		setcookie('auth2','', time()-(3600),'/');
	}
	header("location:login.php");
}
else {
	header("location:login.php");
}
 ?>

 <?php 
session_start();

if (isset($_SESSION['auth3']) || isset($_COOKIE['auth4'])) {
	session_destroy();
	if (isset($_COOKIE['auth4'])) {
		setcookie('auth4','', time()-(3600),'/');
	}
	header("location:login.php");
}
else {
	header("location:login.php");
}
 ?>