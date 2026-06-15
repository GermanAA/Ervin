<?php session_start();

// Validamos que el usuario esté logueado
if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
    exit();
}

// Cargamos la vista
require 'views/inventario.view.php';
?>