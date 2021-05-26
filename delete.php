<?php
session_start();
include "lib/connection.php";


if(isset($_SESSION['id'])){

	session_destroy();

	header("location:viewcart.php");


}