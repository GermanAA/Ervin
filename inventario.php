<?php 
// 1. Cargamos nuestro guardián (hace session_start, valida sesión y conecta a BD)
require_once 'init.php';

// 2. Si el código llega hasta aquí, significa que el usuario SÍ está logueado
// y la ruta es segura. Simplemente cargamos la vista.
require_once BASE_PATH . 'views/inventario.view.php';
?>