<?php

@session_start();

$db = new MySQLi("localhost", "root", "", "ashopping");

foreach ($_POST as $key => $value) {
	$_POST[$key] = addslashes($value);
}
foreach ($_GET as $key => $value) {
	$_GET[$key] = addslashes($value);
}