<?php
session_start();

if( !isset($_SESSION['login_user'])  || $_SESSION['login_user'] < 1) {
	header("Location: login.php?msg=Please Login First");
	die("Stop Here!");
}
