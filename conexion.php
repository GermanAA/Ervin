<?php
 
  //$mysql = new PDO ('mysql:host=localhost;dbname=Expensesgerman', 'gz90wnok', 'Julio70AK7');
  //$mysql = new PDO('mysql:host=localhost;dbname=Expensesgerman', 'root', '');
 

// Datos de conexión a la base de datos
$db_host = '107.180.48.193';
$db_username = 'gz90wnok';
$db_password = 'Julio70AK7';
$db_name = 'Ervin';


$conexion = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);



?>