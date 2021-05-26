<?php
session_start();
if($_SESSION['login']!="Yes") {
	header("Location: index.php?msg=Please Login First");
}
include "../connection.php";


$sql = "UPDATE `cms_pages` SET `title` = '$_POST[title]',  `slug` = '$_POST[slug]',  `contents` = '$_POST[contents]'  WHERE `id` = '$_POST[id]' ";
$res = $db->query($sql);

header("Location: Home.php");

