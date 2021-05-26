<?php
@session_start();

if($_SESSION['login']!="Yes") {
	header("Location: index.php?msg=Please Login First");
}
?>