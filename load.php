<?php

session_start();

if (isset($_SESSION['usuario'])) {
	require 'views/load.view.php';
}else {
		header ('Location:login.php');
}	

require 'funciones.php';
//$conexion = conexion('cremeria', 'root', '');
//$conexion = conexion('cremeria', 'root', 'KGBa9tUE8_JW5.qT');
$conexion = conexion('Ervin', 'gz90wnok', 'Julio70AK7');
if(!$conexion){
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
//print_r($_FILES);
$check = @getimagesize($_FILES['product']['tmp_name']);
if($check !== false){
    $carpeta_destino = 'img/inv/';
    $archivo_subido = $carpeta_destino . $_FILES['product']['name'];
    move_uploaded_file($_FILES['product']['tmp_name'], $archivo_subido);

    $statement = $conexion->prepare('
        INSERT INTO Inventario (Condicion, Fabricante, Modelo, Ubicacion, Price, Estatus, FechaIngreso, Ruta)
        VALUES (:Condicion, :Fabricante, :Modelo, :Ubicacion, :Price, :Estatus, :FechaIngreso, :Ruta)
    ');

    $statement->execute(array(
        ':Condicion' => $_POST['condicion'],
        ':Fabricante' => $_POST['fabricante'],
        ':Modelo' => $_POST['modelo'],
        ':Ubicacion' => $_POST['ubicacion'],
        ':Price' => $_POST['precio'],
        ':Estatus' => $_POST['estatus'],
        ':FechaIngreso' => $_POST['FechaIngreso'],

        ':Ruta' => $_FILES['product']['name']

    ));
}
}
//require 'views/load.view.php';

?>