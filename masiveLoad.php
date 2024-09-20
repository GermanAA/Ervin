<?php

session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/masiveLoad.view.php';
}else {
		header ('Location:login.php');
}	
?>