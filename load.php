<?php

session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/load.view.php';
}else {
		header ('Location:login.php');
}	


?>