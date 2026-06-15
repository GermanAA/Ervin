<?php
 
  //$mysql = new PDO ('mysql:host=localhost;dbname=Expensesgerman', 'gz90wnok', 'Julio70AK7');
  //$mysql = new PDO('mysql:host=localhost;dbname=Expensesgerman', 'root', '');
 

// Datos de conexión a la base de datos
$db_host = '107.180.48.193';
$db_username = 'gz90wnok';
$db_password = 'Julio70AK7';
$db_name = 'Ervin';

$opciones = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
];
$conexion = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_username, $db_password, $opciones);

?>