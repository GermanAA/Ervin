<?php

function conexion ($tabla, $usuario, $pass){

    try{
        //$conexion = new PDO("mysql:host=localhost:33065;dbname=$tabla", $usuario, $pass);
        //$conexion = new PDO("mysql:host=127.0.0.1:33065;dbname=$tabla", $usuario, $pass);
        $conexion = new PDO("mysql:host=107.180.48.193;dbname=$tabla", $usuario, $pass);
       
        return $conexion;
    } catch (PDOException $e) {

        return false;
    }
}



?>