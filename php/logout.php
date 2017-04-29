<?php
session_start();

if(isset($_SESSION['user'])){
	session_unset();
	header("Location:http://localhost/pearson/html/main/index.html");
}

?>